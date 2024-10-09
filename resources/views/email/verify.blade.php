@extends('layouts.main')
@section('title') Verify Your Email @endsection
@section('main')
<main class="w-1/3 mx-auto">
<p class="text-white text-center text-lg bold">We have sent a message to <b>{{$user->email}}</b>. Click the link in the message to verify your email address</p>
</main>
@endsection
