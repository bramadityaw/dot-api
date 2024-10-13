<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PHPUnit\Exception;

class AuthorController extends Controller
{
    /**
     * Display a list of authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('authors.index', [
            'authors' => Author::all(),
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
        // TODO: use a fuzzy search library for handling search results
        $authors = Author::all();
        $result = $authors;
        return view('authors.result', [
            'authors' => $result,
        ]);
    }

    /**
     * Show the form for registering a new author.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('authors.create');
    }

    /**
     * Store a newly registered author in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "birthday" => ["required", "date"]
        ]);

        $author = new Author();
        $author->name = $validated['name'];
        $author->birthday = $validated['birthday'];

        if (!$author->save()) {
            return back()->withErrors([
                'saving' => 'Unable to register author to databse',
            ]);
        }

        return redirect()->route('author.index');
    }

    /**
     * Show the form for editing the specified author's information.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\View\View
     */
    public function edit(Author $author)
    {
        return view('authors.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified author's information in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "birthday" => ["required", "date"]
        ]);
        $author->name = $validated['name'];
        $author->birthday = $validated['birthday'];

        if (!$author->save()) {
            return back()->withErrors([
                'saving' => 'Unable to update author in databse',
            ]);
        }

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if (!$author->delete()) {
            throw new Exception("Failed to delete {$author->name} with id {$author->id}");
        };

        return redirect()->route('author.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
