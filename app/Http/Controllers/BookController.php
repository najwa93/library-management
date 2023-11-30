<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Issue;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexIssues()
    {
        $issues = Issue::all();

        return view('admin.books.issue', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = new Book();
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->save();

        return redirect(route('admin.books.index'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::firstWhere('id', $id);

        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $book = Book::firstWhere('id', $id);

        $book->name = $request->input('name');
        $book->author = $request->input('author');

        $book->save();

        return redirect(route('admin.books.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::firstWhere('id', $id);
        $book->delete();

        return redirect(route('admin.books.index'));
    }
}
