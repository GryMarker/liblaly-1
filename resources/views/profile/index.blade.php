@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">All Profiles</h2>
                </div>
                <div class="offset-md-6 col-md-2">
                    <a class="add-new" href="{{ route('profile.create') }}">Add Profile</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>S.No</th>
                            <th>Student Name</th>
                            <th>Gender</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Permanent Address</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
                            @forelse ($profiles as $profile)
                                <tr>
                                    <td class="id">{{ $profile->id }}</td>
                                    <td>{{ $profile->name }}</td>
                                    <td class="text-capitalize">{{ $profile->gender }}</td>
                                    <td>{{ $profile->phone }}</td>
                                    <td>{{ $profile->email }}</td>
                                    <td>{{ $profile->address }}</td>

                                    <td class="view">
                                        <button data-sid='{{ $profile->id }}>'
                                            class="btn btn-primary view-btn">View</button>
                                    </td>
                                    <td class="edit">
                                        <a href="{{ route('profile.edit', $profile) }}>" class="btn btn-success">Edit</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('profile.destroy', $profile->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-profile">Delete</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Students Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div id="modal">
                        <div id="modal-form">
                            <table cellpadding="10px" width="100%">
        @endsection
