<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Producers;
use App\Movies;

class ProducersController extends Controller
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
        $producers = Producers::all();
        //dd($producers);
        return View::make('producers.index',compact('producers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('producers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['fname'=>'required|max:16|alpha','lname'=>'required|max:16|alpha','company'=>'required|max:30'];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            Producers::create($input);
            return Redirect::to('/producers')->with('success','New Producer added!');
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
        $producers = Producers::find($id);
        //dd($producers);
        return View::make('producers.show',compact('producers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producers = Producers::find($id);
        //dd($actors);
        return View::make('producers.edit',compact('producers'));
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
        $rules = ['fname'=>'required|max:16|alpha','lname'=>'required|max:16|alpha','company'=>'required|max:30'];
        $input = $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $producers->update($input);
            return Redirect::to('/producers')->with('success','New Producer updated!');
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
        $producers = Producers::find($id);
        $producers->delete();
        return Redirect::to('/producers')->with('success','Producer deleted!');
    }
}
