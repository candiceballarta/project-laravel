<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\movies;
use App\producers;

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
        $movies = DB::table('movies')->leftJoin('producers','movies.producer_id','=','producers.producer_id')->get();
        //$movies = movies::withTrashed()->paginate(10);
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
        $producers = producers::pluck('fname','producer_id');
        return View::make('movies.create',compact('producers'));
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
        $rules = ['title' =>'required|max:45','plot'=>'required','year' => 'integer|min:' . (date("Y") - 100) . '|max:' . date("Y"), 'producer_id' => 'integer'];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            movies::create($input);
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
        $movies = movies::find($id);
        //dd($movies);
        return View::make('movies.show',compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = movies::find($id);
        $producers = producers::pluck('fname','producer_id');
        //dd($movies);
        return View::make('movies.edit',compact('movies','producers'));
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
        $rules = ['title' =>'required|max:45','plot'=>'required','year' => 'integer|min:' . (date("Y") - 100) . '|max:' . date("Y"), 'producer_id' => 'integer'];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $movies = movies::find($request->id);
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
        $movies = movies::findOrFail($id);
        $movies->delete();
        return Redirect::to('/movies')->with('success','Movie deleted!');
    }

    public function restore($id) 
    {
        movies::withTrashed()->where('id',$id)->restore();
        return Redirect::route('movies.index')->with('success','Movie restored successfully!');
    }
}
