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
        //dd($request);
        $rules = [
            'role'=>'required|max:16'
        ];

        $input = $request->all();
        $roles = roles::find($input['role_id']);
        //dd($roles);
        $movies = movies::find($input['movie_id']);
        $actors = actors::find($input['actor_id']);
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $movie_actor = new movie_actors;
            $movie_actor->role = $input['role'];
            $movie_actor->roles()->associate($roles);
            $movie_actor->movies()->associate($movies);
            $movie_actor->actors()->associate($actors);
            $movie_actor->save();
            return Redirect::to('/movies')->with('success','New Actor Role added!');
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
