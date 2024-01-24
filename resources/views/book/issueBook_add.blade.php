@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Add Book Issue</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('book_issued') }}">All Issue List</a>

                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('book.issueBooks') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Student Name</label>
                            <select class="form-control" name="profile_id" required>
                                <option value="">Select Name</option>
                                @foreach ($profiles as $profile)
                                    <option value='{{ $profile->id }}'>{{ $profile->name }}</option>
                                @endforeach
                            </select>
                            @error('profile_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Book Name</label>
                            <select class="form-control" name="book_id" required>
                                <option value="">Select Name</option>
                                @foreach ($books as $book)
                                    <option value='{{ $book->id }}'>{{ $book->name }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-outline-info" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
