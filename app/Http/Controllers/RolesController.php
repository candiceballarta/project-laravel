<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\roles;
use App\actors;
use App\movies;

class RolesController extends Controller
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
        $roles = roles::all();
        // dd($roles);
        return View::make('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actors = actors::pluck('fname','actor_id');
        $movies = movies::pluck('title','movie_id');

        return View::make('roles.create', compact('actors', 'movies'));
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
            'role_name'=>'required|max:45'
        ];

        $input = $request->all();
        $movies = movies::find($input['movie_id']);
        $actors = actors::find($input['actor_id']);
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $roles = new roles;
            $roles->role_name = $input['role_name'];
            $roles->save();
            $roles->movies()->attach($movies);
            $roles->actors()->attach($actors);
            
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
        $roles = roles::find($id);
        //dd($roles);
        return View::make('roles.show',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actors = actors::pluck('fname','actor_id');
        $movies = movies::pluck('title','movie_id');

        $roles = roles::find($id);
        //dd($roles);
        return View::make('roles.edit',compact('roles'));
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
            'role_name'=>'required|max:45'
        ];

        $input = $request->all();
        $movies = movies::find($input['movie_id']);
        $actors = actors::find($input['actor_id']);
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $roles = roles::find($id);
            $roles->role_name = $input['role_name'];
            $roles->movies()->associate($movies);
            $roles->actors()->associate($actors);
            $roles->save();
        }

        $roles = roles::find($request->id);
        $roles->update($request->all());
        return Redirect::to('/roles')->with('success','Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = roles::find($id);
        $roles->delete();
        return Redirect::to('/roles')->with('success','Role deleted!');
    }
}
