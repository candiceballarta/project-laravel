<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\genres;

class GenresController extends Controller
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
        //$genres = DB::table('genres')->leftJoin('movie_genres','genre.genre_id','=','movie_genres.genre_id')->leftJoin('movies','movies.movie_id','=','movie_genres.movie_id')->select('genres.genre_id','genres.name','movies.title')->get();
        $genres = genres::all();
        // dd($genres);
        return View::make('genres.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['genre_name'=>'required|max:16|alpha'];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            genres::create($input);
            return Redirect::to('/genres')->with('success','New Genre added!');
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
        //$genres = DB::table('genres')->leftJoin('movie_genres','genre.genre_id','=','movie_genres.genre_id')->leftJoin('movies','movies.movie_id','=','movie_genres.movie_id')->select('genres.genre_id','genres.genre_name','movies.title')->get();
        //$genres = genres::find($id);
        $genres = genres::where('genre_id', '=', $id)->with('movies')->get();
        //dd($genres);
        return View::make('genres.show',compact('genres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres = genres::find($id);
        //dd($genres);
        return View::make('genres.edit',compact('genres'));
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
        $genres = genres::find($request->id);
        $genres->update($request->all());
        return Redirect::to('/genres')->with('success','Genre updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genres = genres::find($id);
        $genres->delete();
        return Redirect::to('/genres')->with('success','Genre deleted!');
    }
}
