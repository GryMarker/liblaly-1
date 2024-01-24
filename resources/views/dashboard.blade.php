@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <!-- Display counts in cards -->
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $authorCount }}</p>
                            <h5 class="card-title mb-0">Authors Listed</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $categoryCount }}</p>
                            <h5 class="card-title mb-0">Categories</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $bookCount }}</p>
                            <h5 class="card-title mb-0">Books Listed</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $profileCount }}</p>
                            <h5 class="card-title mb-0">Profiles</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 14rem; margin: 0 auto;">
                        <div class="card-body text-center">
                            <p class="card-text">{{ $bookIssueCount }}</p>
                            <h5 class="card-title mb-0">Books Issued</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
