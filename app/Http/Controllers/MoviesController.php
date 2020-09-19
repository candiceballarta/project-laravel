<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Movies;
use App\Producers;
use App\Ratings;
use App\Genres;
use App\Roles;

class MoviesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::with('producers')->get();
        //dd($movies);
        return View::make('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producers = Producers::pluck('fname','producer_id');
        $genres = Genres::all();
        return View::make('movies.create',compact('producers', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $rules = [
            'title' =>'required|max:45',
            'plot'=>'required',
            'year' => 'integer|min:' . (date("Y") - 100) . '|max:' . date("Y"),
            'producer_id' => 'integer',
            'movie_image' => 'image|nullable|max:1999'
        ];

        //File Handle Upload
        if($request->hasFile('movie_image')){
            $filenameWithExt = $request->file('movie_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('movie_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('movie_image')->storeAs('public/movie_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $movies = new Movies;
            $movies->title = $input['title'];
            $movies->plot = $input['plot'];
            $movies->year = $input['year'];
            $movies->movie_image = $filenameToStore;
            $movies->producers()->associate($input['producer_id']);
            $movies->save();
            //dd($movies->movie_id);

            foreach ($request->genre_id as $genre_id) {
                DB::insert('insert into genre_movie(genre_id, movie_id) values (?,?)',
                [$genre_id, $movies->movie_id]);
            }

            return Redirect::to('/movies')->with('success','New Movie added!');
        }

        return redirect()->back()->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies = Movies::with('Producers')
        ->where('movies.movie_id', '=', $id)
        ->get();

        $roles = DB::table('roles')
        ->join('movies', 'roles.movie_id', '=', 'movies.movie_id')
        ->join('actors', 'roles.actor_id', '=', 'actors.actor_id')
        ->where('movies.movie_id', '=', $id)
        ->get();

        $ratings = DB::table('ratings')
        ->join('movies', 'ratings.movie_id', '=', 'movies.movie_id')
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->where('movies.movie_id', '=', $id)
        ->get();

        $average = DB::table('ratings')
        ->join('movies', 'ratings.movie_id', '=', 'movies.movie_id')
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->where('movies.movie_id', '=', $id)
        ->avg('score');
        $round = round($average, 1);

        //dd($movies);
        return View::make('movies.show',compact('movies', 'ratings', 'round', 'roles'));
    }

    /**
     *
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movies::with('genres')->find($id);

        $genre_movie = DB::table('genre_movie')
        ->where('movie_id', $id)->pluck('genre_id')->toArray();
        $genres = Genres::all();
        $producers = Producers::pluck('fname','producer_id');

        //dd($movies);
        return View::make('movies.edit',compact('movies', 'genre_movie', 'genres','producers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' =>'required|max:45',
            'plot'=>'required',
            'year' => 'integer|min:' . (date("Y") - 100) . '|max:' . date("Y"),
            'producer_id' => 'integer'
        ];

        if($request->hasFile('movie_image')){
            $filenameWithExt = $request->file('movie_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('movie_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('movie_image')->storeAs('public/movie_images', $filenameToStore);
        }

        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $movies = Movies::find($id);
            $genre_ids = $request->input('genre_id');

            if(empty($genre_ids)){
                DB::table('genre_movie')->where('movie_id',$id)->delete();
            } else {
                foreach($genre_ids as $genre_id) {
                    DB::table('genre_movie')->where('movie_id',$id)->delete();
                }
                foreach($genre_ids as $genre_id) {
                    DB::table('genre_movie')->insert(['genre_id' => $genre_id, 'movie_id' => $id]);
                }
            }

            $movies->title = $input['title'];
            $movies->plot = $input['plot'];
            $movies->year = $input['year'];
            $movies->producer_id = $input['producer_id'];
            if($request->hasFile('movie_image')){
                $movies->movie_image = $filenameToStore;
            }
            $movies->update($input);
            return Redirect::to('/movies')->with('success','Movie updated!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = Movies::findOrFail($id);
        DB::table('genre_movie')->where('movie_id',$id)->delete();
        $movies->delete();
        return Redirect::to('/movies')->with('success','Movie deleted!');
    }

    public function restore($id)
    {
        Movies::withTrashed()->where('movie_id',$id)->restore();
        return Redirect::route('movies.index')->with('success','Movie restored successfully!');
    }
}
