@extends('layouts.main')
@section('title') manage authors @endsection
@section('main')
    <main class="mx-auto w-4/5 py-6">
        <div class="bg-white rounded-lg py-4 px-5 min-h-[80dvh]">
        <div class="w-fit mx-auto">
            <div class="flex items-center mb-2">
                <a class="text-sm text-gray-600 underline" href="{{ route('dashboard') }}">Go Back...</a>
            </div>
            <section class="flex items-center justify-between mb-4">
                <h1 class="text-xl">Authors</h1>
                    <form action="{{ route('author.search') }}">
                        <div class="rounded-md border border-gray-200 px-3 py-2">
                             <input name="q" type="text" placeholder="Search authors..." value="{{ $q ?? '' }}">
                        </div>
                    </form>
                <a href="{{ route('author.create') }}">
                    <div class="rounded-lg py-1 px-2 text-white bg-blue-500 text-sm text-center">
                        Enter New
                    </div>
                </a>
            </section>
            <section class="rounded-lg border border-gray-200">
                <table>
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col" class="py-3 px-6">Name</th>
                            <th scope="col" class="py-3 px-6">Birthday</th>
                            <th scope="col" class="py-3 px-6">No of Books</th>
                            <th scope="col" class="py-3 px-6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($authors) != 0)
                    @foreach($authors as $author)
                        <tr>
                            <td class="py-3 px-6">
                                {{ $author->name }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                {{ \Carbon\Carbon::parse($author->birthday)->translatedFormat('l, j F o') }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                {{ count(\App\Models\Book::where('author_id', $author->id)->get()) }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                <div class="grid grid-cols-2 gap-2 text-sm text-white">
                                    <a href="{{ route('author.edit', $author->id) }}" class="inline-block w-fit rounded-md px-3 py-2 bg-green-500">Edit</a>
                                    <button class="delete rounded-md px-3 py-2 bg-red-500" data-id="{{ $author->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td class="py-4 text-center" colspan="4">Nothing here yet...</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</main>
@include('authors.destroy')
@endsection
