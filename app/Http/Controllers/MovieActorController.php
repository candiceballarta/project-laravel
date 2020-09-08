<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\movie_actors;
use App\movies;
use App\roles;
use App\actors;

class MovieActorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function create()
    {
        $movies = movies::pluck('title','movie_id');
        $actors = actors::pluck('fname','actor_id');
        $roles = roles::pluck('role_name','role_id');
        return View::make('movieactors.create', compact('movies', 'actors', 'roles'));
    }

    public function store(Request $request)
    {
        $rules = ['role_name'=>'required|max:16|alpha'];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            movie_actors::create($input);
            return Redirect::to('/movieactors')->with('success','New Actor Role added!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    }

    public function edit($id)
    {
        $movie_actors = movie_actors::find($id);
        //dd($actors);
        return View::make('movieactors.edit',compact('movie_actors'));
    }

    public function update(Request $request, $id)
    {
        $movie_actors = movie_actors::find($request->id);
        $movie_actors->update($request->all());
        return Redirect::to('/movieactors')->with('success','Actor Role updated!');
    }
}
