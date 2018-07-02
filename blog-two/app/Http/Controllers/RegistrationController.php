<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    //
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // Valide the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // Create and save the user.

        // This bit that the tutorial included is wrong. Password needs to be encrypted. Sessions controller authenticator automatically encrypts when verifying a password.
        //$user = User::create(request(['name', 'email', 'password']));

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // Sign them in.
        auth()->login($user);

        // Redirect to the home page.

        return redirect()->home();
    }
}
