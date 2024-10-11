<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
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

    public function verify(EmailVerificationRequest $request) : RedirectResponse
    {
        $request->fulfill();

        return redirect()->intended('/dashboard');
    }

    public function resend(Request $request) : RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('sent', true);
    }
}
