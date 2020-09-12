<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class AdminEmailController extends Controller
{

    public function create()
    {
        $users = User::pluck('email','email');

        return view('admin.create', compact('users'));
    }

    public function store()
    {
        //dd(request()->all());

        $data = request()->validate([
            'email' => 'email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to($data['email'])->send(new AdminMail($data));
        return Redirect::to('/admin')->with('success','Email has been sent!');
    }

}
