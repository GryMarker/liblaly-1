<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Models\Author;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view("book.index", compact('books'));
    }

    public function create()
    {
        $authors = Author::latest()->get();
        $categories = Category::latest()->get();

        return view('book.create', compact('authors', 'categories'));
    }

    public function store(StorebookRequest $request)
    {
        try {
            $book = Book::create($request->validated() + ['status' => 'Y']);
            $book->categories()->sync([$request->category_id]);

            return redirect()->route('books.index')->with('success', 'Book added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error adding book: ' . $e->getMessage());
        }
    }

    public function edit(Book $book)
    {
        $authors = Author::latest()->get();
        $categories = Category::latest()->get();

        return view('book.edit', compact('authors', 'categories', 'book'));
    }

    public function update(UpdatebookRequest $request, Book $book)
    {
        try {
            $book->update($request->validated());
            $book->categories()->sync([$request->category_id]);

            return redirect()->route('books.index')->with('success', 'Book updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error updating book: ' . $e->getMessage());
        }
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting book: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }
}
