@extends('layouts.main')
@section('title') manage books @endsection
@section('main')
    <main class="mx-auto w-4/5 py-6">
        <div class="bg-white rounded-lg py-4 px-5 min-h-[80dvh]">
            <div class="flex items-center mb-2">
                <a class="text-sm text-gray-600 underline" href="{{ route('book.index') }}">Go Back...</a>
            </div>
            @error('saving')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
            <form action="{{ route('book.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-2">
                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                             <div class="md:col-span-5">
                                @error('title')
                                <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                <label for="title">Title</label>
                                <input required type="text" name="title" id=
                                    "title" class=
                                    "h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $book->title }}">
                            </div>
                            <div class="md:col-span-5">
                                @error('page_length')
                                <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                <label for="page_length">Page length</label>
                                <input required type="number" name="page_length" id=
                                    "page_length" class=
                                    "h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $book->page_length }}" min="1">
                            </div>
                            <div class="md:col-span-5">
                                @error('author')
                                <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                <label for="author">Author</label>
                                <select name="author" id="author" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="">
                                    <option value="">Select author</option>
                                    @foreach($authors as $author)
                                    <option {{ $book->author_id === $author->id ? 'selected' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-5">
                                @error('author')
                                <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                <label for="summary">Summary</label>
                                <textarea name="summary" id="summary" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="">{{ $book->summary }}</textarea>
                            </div>
                            <div class="md:col-span-5">
                                @error('author')
                                <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                <label for="published_date">Published Date</label>
                                <input required type="date" name="published_date" id=
                                    "published_date" class=
                                    "h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    value="{{ $book->published_date }}">
                            </div>
                            <div class="md:col-span-5 mt-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-end">
                                     Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
