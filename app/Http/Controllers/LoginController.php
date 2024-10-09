<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
    * Returns the login form view
    *
    * @return Illuminate\View\View
    */
    public function index() : View
    {
        return view('login');
    }

    /**
    * Validates the login request and redirects to
    * the dashboard if the right combination of
    * email and password exists. If it does not,
    * report back to the user which field has an error
    * with corresponding messages.
    *
    * @param Request $request
    * @return RedirectResponse
    */
    public function auth(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'No user with email' . $request['email'] . ' found.',
            'password' => 'Wrong password. Please try again.',
        ]);
    }
}
