<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
    * Returns the registration form view
    *
    * @return Illuminate\View\View
    */
    public function index() : View
    {
        return view('register');
    }

    /**
    * Validates the login request and redirects to
    * the dashboard if the right combination of
    * email and password exists. If it does not,
    * report back to the user which field has an error
    * with corresponding messages.
    *
    * This also sets the `email` key to show in /verifyEmail
    *
    * @param Request $request
    * @return RedirectResponse
    */
    public function register(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        $user = new User;
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];

        // Store email to address in session for /verifyEmail
        $request->session()->put('email', $user->email);

        $user->password = Hash::make($credentials['password']);
        if (!$user->save()) {
            return back()->withErrors([
                'db' => 'Failed to save user to database.',
            ]);
        }

        event(new Registered($user));

        return redirect()->intended('/verifyEmail');
    }
}
