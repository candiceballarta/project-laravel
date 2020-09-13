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
        return View::make('roles.create');
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
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $roles = new roles;
            $roles->role_name = $input['role_name'];
<<<<<<< HEAD
            $roles->actors()->associate($actors);
            $roles->movies()->associate($movies);
            $roles->save();$roles->save();
            return Redirect::to('/roles')->with('success','New Role added!');
=======
            $roles->save();
            return Redirect::to('/roles')->with('success','Role created!');
>>>>>>> 4fdb50568c32aeccb85b87d64dc6effd9c2604ce
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
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $roles = roles::find($id);
            $roles->role_name = $input['role_name'];
            $roles->save();

        }
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
