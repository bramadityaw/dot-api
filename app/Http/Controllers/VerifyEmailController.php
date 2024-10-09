<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
    public function show() : View
    {
        return view('email.verify', [
            'user' => Auth::user(),
        ]);
    }

    public function verify(EmailVerificationRequest $request) : RedirectResponse
    {
        $request->fulfill();

        return redirect('/verifyEmail');
    }

    public function resend(Request $request) : RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('sent', true);
    }
}
