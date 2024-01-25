@extends('layouts.app')
@section('content')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">All Books</h2>
            </div>
            <div class="offset-md-7 col-md-2">
                <a class="add-new" href="{{ route('book.create') }}">Add Book</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="message"></div>
                <table class="content-table">
                    <thead>
                        <th>S.No</th>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                        <tr>
                            <td class="id">{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->categories->name }}</td>
                            <td>{{ optional($book->author)->name }}</td>

                            <td>
                                @if ($book->status == 'Y')
                                <span class='badge badge-success'>Available</span>
                                @else
                                <span class='badge badge-danger'>Issued</span>
                                @endif
                            </td>
                            <td class="edit">
                                <a href="{{ route('book.edit', $book) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td class="delete">
                                <form action="{{ route('book.destroy', $book) }}" method="post">
                                    <button class="btn btn-danger">Delete</button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">No books found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
