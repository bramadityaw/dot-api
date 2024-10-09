@extends('layouts.main')
@section('title') Home @endsection
@section('main')
    <main class="mx-auto w-4/5">
        <div class="bg-white rounded-lg py-4 px-5">
            <div class="flex justify-between">
                <h1>Hello {{ $user->name }}!</h1>
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
    </main>
@endsection
