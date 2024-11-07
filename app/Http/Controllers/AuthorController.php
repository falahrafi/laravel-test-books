<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch books with related author data
        $authors = Author::all();

        // Pass books data to the view
        return view('pages.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        Author::create($request->all());
        return redirect()->route('authors.index')
        ->withSuccess('New author is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('pages.authors.edit', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author): RedirectResponse
    {
        $author->update($request->all());
        return redirect()->route('authors.index')
        ->withSuccess('Author is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        // Delete all books related to the author
        $author->books()->delete(); // Assumes the Author model has a `books` relationship defined

        // Delete the author
        $author->delete();

        // Return a JSON response indicating success
        return response()->json(['success' => true, 'message' => 'Author and related books deleted successfully']);
    }
}
