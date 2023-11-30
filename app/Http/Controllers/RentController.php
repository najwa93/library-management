<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('book-rent.index', compact('books'));

    }

    public function indexIssues(){
        $issues = Issue::all();

        return view('book-rent.index-issue', compact('issues'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

    }

    public function rentBook($id)
    {
        $book = Book::firstWhere('id', $id);
        $issue_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime("+" . (20) . " days"));

        $issue = new Issue();
        $issue->book_id = $id;
        $issue->user_id = Auth::id();
        $issue->issued_on = $issue_date;
        $issue->returned_date = $return_date;
        $issue->available = 0;
        $book->status = 0;

        $book->save();
        $issue->save();

        return redirect()->route('rent.index');
    }

    public function returnBook($book,$rent){
        $book = Book::firstWhere('id', $book);
        $issue = Issue::find($rent);
        $book->status = 1;
        $issue->returned_date = now();
        $issue->available = 1;
        $book->save();
        $issue->save();

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
