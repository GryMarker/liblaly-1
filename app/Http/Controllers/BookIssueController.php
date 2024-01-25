<?php

namespace App\Http\Controllers;

use App\Models\Book_issue;
use App\Http\Requests\Storebook_issueRequest;
use App\Models\author;
use App\Models\book;
use App\Models\settings;
use App\Models\profile;
use \Illuminate\Http\Request;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(view('book.issueBooks', [
            'books' => Book_issue::Paginate(5)
        ]));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('book.issueBook_add', [
            'profiles' => profile::latest()->get(),
            'books' => book::where('status', 'Y')->get(),
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebook_issueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'profile_id' => 'required',
        'book_id' => 'required',
        // Add any other validation rules as needed
    ]);

    // Retrieve return_days with fallback to 0 if settings record is not found
    $return_days = optional(settings::latest()->first())->return_days ?? 0;

    $issue_date = now();
    $return_date = now()->addDays($return_days);

    $data = Book_issue::create([
        'profile_id' => $request->profile_id,
        'book_id' => $request->book_id,
        'issue_date' => $issue_date,
        'return_date' => $return_date,
        'issue_status' => 'N',
    ]);

    // Update book status
    $book = book::find($request->book_id);
    $book->status = 'N';
    $book->save();

    return redirect()->route('book.index');
}


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // calculate the total fine  (total days * fine per day)
        $book = book_issue::where('id',$id)->get()->first();
        $first_date = date_create(date('Y-m-d'));
        $last_date = date_create($book->return_date);
        $diff = date_diff($first_date, $last_date);
        $fine = (settings::latest()->first()->fine * $diff->format('%a'));
        return response(view('book.issueBook_edit', [
            'book' => $book,
            'fine' => $fine,
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookRequest  $request
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $book = book_issue::find($id);
        $book->issue_status = 'Y';
        $book->return_date = now();
        $book->save();
        $bookk = book::find($book->book_id);
        $bookk->status= 'Y';
        $bookk->save();
        return redirect()->route('book.issueBooks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book_issue::find($id)->delete();
        return redirect()->route('book_issued');
    }
}
