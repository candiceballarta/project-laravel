<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\actors;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = actors::all();
        // dd($actors);
        return View::make('actors.index',compact('actors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('actors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['fname'=>'required|max:16|alpha','lname'=>'required|max:16|alpha','notes'=>'required|max:50'];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            actors::create($input);
            return Redirect::to('/actors')->with('success','New Actor added!');
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
        $actors = actors::find($id);
        //dd($actors);
        return View::make('actors.show',compact('actors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actors = actors::find($id);
        //dd($actors);
        return View::make('actors.edit',compact('actors'));
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
        $actors = actors::find($request->id);
        $actors->update($request->all());
        return Redirect::to('/actors')->with('success','Actor updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actors = actors::find($id);
        $actors->delete();
        return Redirect::to('/actors')->with('success','Actor deleted!');
    }
}
