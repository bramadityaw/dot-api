<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a list of books.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('books.index', [
            'books' => Book::all(),
        ]);
    }

    /**
     * Returns search results based on the
     * search query.
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $books = Book::all();
        // TODO: use a fuzzy search library for handling search results
        $result = $books;
        return view('books.index', [
            'books' => $result,
        ]);
    }

    /**
     * Show the form for creating a book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', [
            'authors' => Author::all(),
        ]);
    }

    /**
     * Store a new book entry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "author" => ["required", "exists:authors,id"],
            "title" => "required",
            "page_length" => ["required", "integer", "min:1"],
            "summary" => "required",
            "published_date" => ["required", "date"],
        ]);

        $book = new Book();
        $book->author_id = $validated["author"];
        $book->title = $validated["title"];
        $book->page_length = $validated["page_length"];
        $book->summary = $validated["summary"];
        $book->published_date = $validated["published_date"];

        if (!$book->save()) {
            return back()->withErrors([
                'saving' => 'Unable to register book to databse',
            ]);
        }

        return redirect()->route('book.index');
    }

    /**
     * Display the specified book.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified book.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'authors' => Author::all(),
        ]);
    }

    /**
     * Update the specified book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
         $validated = $request->validate([
            "author" => ["required", "exists:authors,id"],
            "title" => "required",
            "page_length" => ["required", "integer", "min:1"],
            "summary" => "required",
            "published_date" => ["required", "date"],
        ]);

        $book->author_id = $validated["author"];
        $book->title = $validated["title"];
        $book->page_length = $validated["page_length"];
        $book->summary = $validated["summary"];
        $book->published_date = $validated["published_date"];

        if (!$book->save()) {
            return back()->withErrors([
                'saving' => 'Unable to update book in database',
            ]);
        }

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if (!$book->delete()) {
            throw new \Exception("Failed to delete {$book->title} with id {$book->id}");
        };

        return redirect()->route('book.index');
    }
}
