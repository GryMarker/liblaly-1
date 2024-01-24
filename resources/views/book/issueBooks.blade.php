@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">All Book Issue</h2>
                </div>
                <div class="offset-md-6 col-md-3">
                    <a class="add-new" href="{{ route('book_issue.create') }}">Add Book Issue</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="content-table">
                        <thead>
                            <th>S.No</th>
                            <th>Student Name</th>
                            <th>Book Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
