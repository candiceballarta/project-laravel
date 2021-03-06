<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Ratings;
use App\Movies;
use Auth;

class RatingsController extends Controller
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
        $ratings = Ratings::all();
        // dd($ratings);
        return View::make('ratings.index',compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = movies::pluck('title','movie_id');
        return View::make('ratings.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'score'=>'required',
            'comment'=>'required|profanity|max:350'
        ];

        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $rating = new ratings;
            $rating->score = $input['score'];
            $rating->comment = $input['comment'];
            $rating->movies()->associate($input['movie_id']);
            $rating->user_id = Auth::id();
            $rating->save();


            return redirect()->back()->with('success','New Rating added!');
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
        $ratings = Ratings::find($id);
        //dd($ratings);
        return View::make('ratings.show',compact('ratings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ratings = Ratings::find($id);
        $movies = movies::pluck('title','movie_id');
        //dd($ratings);
        return View::make('ratings.edit',compact('ratings', 'movies'));
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
            'score'=>'required',
            'comment'=>'required|profanity|max:350'
        ];

        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $rating = Ratings::find($id);
            $rating->score = $input['score'];
            $rating->comment = $input['comment'];
            $rating->movies()->associate($input['movie_id']);
            $rating->user_id = Auth::id();
            $rating->save();

            return Redirect::to('/movies')->with('success','Rating updated!');
        }
        return redirect()->back()->withInput()->withErrors($validator);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ratings = Ratings::find($id);
        $ratings->delete();
        return Redirect::to('/ratings')->with('success','Rating deleted!');
    }
}
