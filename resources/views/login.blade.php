@extends('layouts.main')
@section('title') Login @endsection
@section('main')
<main>
        <div class="w-4/5 xl:w-2/5 mx-auto">
            <div class="rounded-lg bg-white p-6">
                <div class="flex justify-center items-center py-12">
                    <img src="/images/dot-logo.png" alt="DOT logo" width="100px" height="36px">
                    <span class="text-[36px] ml-1">API</span>
                </div>
                <form action="/login" method="POST">
                    @csrf
                    <div class="flex-col">
                        <div class="flex items-center">
                            <label for="name" class="w-1/5 text-lg">Username</label>
                            <input class="block w-4/5 my-2 p-2 border-2 border-gray-200 rounded-md" id="name" name="name" type="text" placeholder="Enter your username" required>
                        </div>
                        @if ($errors->any())
                        @foreach ($errors->get('name') as $error)
                            <div>
                                {{ $error }}
                            </div>
                        @endforeach
                        @endif
                        <div class="flex items-center">
                            <label for="password" class="w-1/5 text-lg">Password</label>
                            <input class="block w-4/5 my-2 p-2 border-2 border-gray-200 rounded-md" id="password" name="password" type="password" placeholder="Enter password" required>
                        </div>
                        @if ($errors->any() && (count($errors->get('name')) == 0))
                        @foreach ($errors->get('password') as $error)
                            <div>
                                {{ $error }}
                            </div>
                        @endforeach
                        @endif
                        <button class="bg-[#1b3c73] mx-auto block rounded-md my-6 py-2 px-3 text-white" type="submit">Log In</button>
                    </div>
                </form>
                <p class="mx-auto w-fit">
                No account?
                <a class="text-blue-500 underline" href="/register">Register</a>
                </p>
            </div>
        </div>
</main>
@endsection
