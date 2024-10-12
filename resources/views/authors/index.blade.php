@extends('layouts.main')
@section('title') manage authors @endsection
@section('main')
<table>
    <thead>
        <tr>
            <th scope="col" class="py-3 px-6">Name</th>
            <th scope="col" class="py-3 px-6">Birthday</th>
        </tr>
    </thead>
    <tbody>
    @if($authors)
    @foreach($authors as $author)
        <tr>
            <td>
                {{ $author->name }}
            </td>
            <td>
                {{ \Carbon\Carbon::parse($author->birthday)->translatedFormat('l, j F o') }}
            </td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>
@endsection
