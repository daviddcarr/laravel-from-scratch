<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // Attempt to Authenticate the user
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        // If not, redirect back.


        // If so, sign them in.
        //auth()->login($user);

        // Redirect to the home page.
        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
