@extends('layouts.main')
@section('title') manage books @endsection
@section('main')
<table>
    <thead>
        <tr>
            <th scope="col" class="py-3 px-6">Title</th>
            <th scope="col" class="py-3 px-6">Author</th>
            <th scope="col" class="py-3 px-6">Summary</th>
            <th scope="col" class="py-3 px-6">Page Length</th>
            <th scope="col" class="py-3 px-6">Published Date</th>
        </tr>
    </thead>
    <tbody>
    @if($books)
    @foreach($books as $book)
        <tr>
            <td>
                {{ $book->title }}
            </td>
            <td>
                {{ \App\Models\Author::find($book->author_id)->name }}
            </td>
            <td>
                {{ $book->summary }}
            </td>
            <td>
                {{ $book->page_length }}
            </td>
            <td>
                {{ \Carbon\Carbon::parse($book->published_date)->translatedFormat('l, j F o') }}
            </td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>
@endsection
