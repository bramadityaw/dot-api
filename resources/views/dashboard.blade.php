@extends('layouts.main')
@section('title') {{ $user->name }}'s dashboard @endsection
@section('main')
    <main class="mx-auto w-4/5 py-6">
        <div class="bg-white rounded-lg py-4 px-5">
            <div class="flex justify-between">
                <h1 class="text-lg font-bold">Hello {{ $user->name }}!</h1>
                   @if(!$user->email_verified_at)
                    <p>
                        <a href="{{ url('/verifyEmail') }}" class="underline font-semibold text-orange-600">
                            Verify your email
                        </a>
                        so that you can reset your password.
                    </p>
                   @endif
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">
                        <span class="rounded-lg py-2 px-3 text-white bg-blue-500">
                            Log Out
                        </span>
                    </button>
                </form>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white rounded-lg py-4 px-5 mt-4 grid grid-cols-3">
                <h1 class="col-span-2 mt-2">Authors</h1>
                <a href="{{ url('/dashboard/authors') }}">
                    <div class="rounded-lg py-2 px-3 text-white bg-blue-500 text-center font-bold">
                        Manage
                    </div>
                </a>
            </div>
            <div class="bg-white rounded-lg py-4 px-5 mt-4 grid grid-cols-3">
                <h1 class="col-span-2 mt-2">Books</h1>
                <a href="{{ url('/dashboard/books') }}">
                    <div class="rounded-lg py-2 px-3 text-white bg-blue-500 text-center font-bold">
                        Manage
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection
