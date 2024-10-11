@extends('layouts.main')
@section('title') Verify Your Email @endsection
@section('main')
<main class="w-1/3 mx-auto">
<p class="text-white text-center text-lg bold">We have sent a message to <b>{{$email}}</b>. Click the link in the message to verify your email address</p>
<br>
<p class="text-white text-center text-lg bold">
Didn't get the email?
</p>
<form action="/verifyEmail" method="POST" class="w-fit mx-auto">
    <button type="submit"><b class="text-white underline">Resend</b> </button>
</form>
</main>
@endsection
