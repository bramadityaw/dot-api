<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
    /**
    * Returns the email verification notice view
    *
    * @return Illuminate\View\View
    */
    public function show() : View|RedirectResponse
    {
        $email = session('email');
        if (!$email) {
            return redirect()->intended('/login');
        }
        return view('email.verify', [
            'email' => $email,
        ]);
    }

    /**
    * Verifies a users email after the link in the email
    * sent to the user is clicked.
    * At this point, the user is authenticated so redirecting
    * them to the dashboard is okay.
    *
    * @param Illuminate\Foundation\Auth\EmailVerificationRequest
    * @return Illuminate\Http\RedirectResponse
    */
    public function verify(EmailVerificationRequest $request) : RedirectResponse
    {
        $request->fulfill();

        return redirect()->intended('/dashboard');
    }

    /**
    * Resends the email notification again if
    * the user missed it.
    *
    * @param Illuminate\Http\Request
    * @return Illuminate\Http\RedirectResponse
    */
    public function resend(Request $request) : RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('sent', true);
    }
}
