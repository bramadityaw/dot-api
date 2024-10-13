@extends('layouts.main')
@section('title') manage authors @endsection
@section('main')
    <main class="mx-auto w-1/2 py-6">
        <div class="bg-white rounded-lg py-4 px-5 min-h-[80dvh]">
            <div class="flex items-center mb-2">
                <a class="text-sm text-gray-600 underline" href="{{ route('author.index') }}">Go Back...</a>
            </div>
            <p>Edit author:</p>
            @error('saving')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
            <form action="{{ route('author.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-2">
                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $author->name }}" required>
                                @error('name')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-5">
                                <label for="birthday">Birthday</label>
                                <input type="date" name="birthday" id=
                                    "birthday" class=
                                    "h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $author->birthday }}" required>
                                @error('birthday')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-5 mt-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-end">
                                     Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
