@extends('layouts.main')
@section('title') manage books @endsection
@section('main')
    <main class="mx-auto min-w-[720px] w-4/5 py-6">
        <div class="bg-white rounded-lg py-4 px-5 min-h-[80dvh]">
        <div class="w-fit mx-auto">
            <div class="flex items-center mb-2">
                <a class="text-sm text-gray-600 underline" href="{{ route('dashboard') }}">Go Back...</a>
            </div>
            <section class="flex items-center justify-between mb-4">
                <h1 class="text-xl">Books</h1>
                <a href="{{ route('book.create') }}">
                    <div class="rounded-lg py-1 px-2 text-white bg-blue-500 text-sm text-center">
                        Enter New
                    </div>
                </a>
            </section>
            <section class="rounded-lg border border-gray-200">
                <table>
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col" class="py-3 px-6">Title</th>
                            <th scope="col" class="py-3 px-6">Author</th>
                            <th scope="col" class="py-3 px-6">Summary</th>
                            <th scope="col" class="py-3 px-6">Page Length</th>
                            <th scope="col" class="py-3 px-6">Published Date</th>
                            <th scope="col" class="py-3 px-6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($books) != 0)
                    @foreach($books as $book)
                        <tr>
                            <td class="py-3 px-6">
                                {{ $book->title }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                {{ \App\Models\Author::find($book->author_id)->name }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                {{ $book->summary }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                {{ $book->page_length }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                {{ \Carbon\Carbon::parse($book->published_date)->translatedFormat('l, j F o') }}
                            </td>
                            <td class="py-3 px-6 border-l border-gray-20">
                                <div class="grid grid-cols-2 gap-2 text-sm text-white">
                                    <a href="{{ route('book.edit', $book->id) }}" class="inline-block w-fit rounded-md px-3 py-2 bg-green-500">Edit</a>
                                    <button class="delete rounded-md px-3 py-2 bg-red-500" data-id="{{ $book->id }}">Delete</button>
                                </div>
                            </td>
                       </tr>
                    @endforeach
                    @else
                        <tr>
                            <td class="py-4 text-center" colspan="6">Nothing here yet...</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</main>
@include('books.destroy')
@endsection
