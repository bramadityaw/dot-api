@extends('layouts.main')
@section('title') Register @endsection
@section('main')
<main>
        <div class="w-4/5 xl:w-2/5 mx-auto">
            <div class="rounded-lg bg-white p-6">
                <div class="flex justify-center items-center py-12">
                    <img src="/images/dot-logo.png" alt="DOT logo" width="100px" height="36px">
                    <span class="text-[36px] ml-1">API</span>
                </div>
                @if ($errors->any())
                    @foreach($errors->get('db') as $error)
                    <div>
                        {{ $error }}
                    </div>
                    @endforeach
                @endif
                <form action="/register" method="POST">
                    @csrf
                    <div class="flex-col">
                        <div class="flex items-center">
                            <label for="name" class="w-1/5 text-lg">Username</label>
                            <input class="block w-4/5 my-2 p-2 border-2 border-gray-200 rounded-md" id="name" name="name" type="text" placeholder="Enter your username" required>
                        </div>
                        @if($errors->has('name'))
                        <div>
                            @foreach($errors->get('name') as $error)
                            <p>
                                {{ $error }}
                            </p>
                            @endforeach
                        </div>
                        @endif
                        <div class="flex items-center">
                            <label for="email" class="w-1/5 text-lg">Email</label>
                            <input class="block w-4/5 my-2 p-2 border-2 border-gray-200 rounded-md" id="email" name="email" type="email" placeholder="Enter your administrator e-mail" required>
                        </div>
                        @if($errors->has('email'))
                        <div>
                            @foreach($errors->get('email') as $error)
                            <p>
                                {{ $error }}
                            </p>
                            @endforeach
                        </div>
                        @endif
                        <div class="flex items-center">
                            <label for="password" class="w-1/5 text-lg">Password</label>
                            <input class="block w-4/5 my-2 p-2 border-2 border-gray-200 rounded-md" id="password" name="password" type="password" placeholder="Enter password" required>
                        </div>
                        @if($errors->has('password'))
                        <div>
                            @foreach($errors->get('password') as $error)
                            <p>
                                {{ $error }}
                            </p>
                            @endforeach
                        </div>
                        @endif
                        <button class="bg-[#1b3c73] mx-auto block rounded-md my-6 py-2 px-3 text-white" type="submit">Register</button>
                    </div>
                </form>
                <p class="mx-auto w-fit">
                Have an account?
                <a class="text-blue-500 underline" href="/login">Log In</a>
                </p>
            </div>
        </div>
</main>
@endsection
