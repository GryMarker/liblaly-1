<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* COMMOM CSS */
        body {
            background: #F6F6F6;
            font-family: 'Open Sans', sans-serif;
        }

        a,
        a:hover,
        a:focus {
            text-decoration: none;
            outline: none;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* Header Styling */
        #header {
            background: #F6F6F6;
        }

        .logo img {
            width: 100%;
        }

        .dropdown {
            text-align: right;
            padding: 34px 0;
        }

        .dropdown button {
            background: #193a6f;
            border: none;
            opacity: 0.9;
        }

        .dropdown button:hover {
            background: #193a6f;
            opacity: 0.9;
        }

        .btn-secondary:not(:disabled):not(.disabled):active:focus,
        .btn-secondary:not(:disabled):not(.disabled).active:focus,
        .show>.btn-secondary.dropdown-toggle:focus {
            box-shadow: none;
        }

        .btn-secondary:not(:disabled):not(.disabled):active,
        .btn-secondary:not(:disabled):not(.disabled).active,
        .show>.btn-secondary.dropdown-toggle {
            background: #193a6f;
            opacity: 0.9;
        }

        .btn-secondary:focus,
        .btn-secondary.focus {
            border: none;
            background: #193a6f;
            box-shadow: none;
            opacity: 0.9;
        }

        #menubar {
            background: #193a6f;
            text-align: center;
            opacity: 0.9;
        }

        .menu li {
            display: inline-block;
        }

        .menu li a {
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 10px 13px;
            display: block;
            transition: all 0.3s;
        }

        .menu li a:hover {
            background: #fff;
            color: #193a6f;
        }

        /* Footer Styling */
        #footer {
            background: ##193a6f;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            opacity: 0.9;
        }

        #footer span,
        #footer a {
            color: #fff;
        }

        /* ADMIN CONTENT */
        #admin-content {
            min-height: 80vh;
            padding: 20px 0 40px;
        }

        #admin-content .admin-heading {
            color: #0E0E0E;
            font-size: 30px;
            font-weight: 600;
            margin: 0 0 40px;
            position: relative;
        }

        #admin-content .admin-heading:after {
            content: "";
            background: #f6f6f6;
            width: 100%;
            height: 3px;
            opacity: 0.9;
            position: absolute;
            left: 0;
            bottom: -10px;
        }

        #admin-content .add-new {
            background: #193a6f;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            border: 2px solid transparent;
            padding: 7px 15px;
            display: block;
            opacity: 0.9;
            transition: all 0.3s;
        }

        #admin-content .add-new:hover {
            background: #fff;
            color: #193a6f;
            border: 2px solid #193a6f;
            opacity: 0.9;
        }

        #admin-content .content-table {
            width: 100%;
            margin: 0 0 20px;
        }

        #admin-content .content-table thead {
            background: #444;
            color: #fff;
        }

        #admin-content .content-table th {
            text-align: center;
            text-transform: uppercase;
            border: 1px solid #000;
            padding: 10px;
        }

        #admin-content .content-table tbody tr:nth-child(odd) {
            background: #e7e7e7;
        }

        #admin-content .content-table tbody tr:nth-child(even) {
            background: transparent;
        }

        #admin-content .content-table tbody td {
            text-align: center;
            border: 1px solid #000;
            padding: 10px;
        }

        #admin-content .content-table tbody td:nth-child(2),
        #admin-content .content-table tbody td:nth-child(5) {
            text-align: left;
        }

        .pagination {
            text-align: center;
            display: block;
        }

        .pagination li {
            display: inline-block;
            margin-right: 8px;
        }

        .pagination li a {
            background: #193a6f;
            color: #fff;
            font-size: 14px;
            padding: 6px 12px;
            opacity: 0.9;
        }

        .pagination li.active>a {
            background: #193a6f;
            opacity: 0.7;
        }

        /* ADD AUTHOR */
        .yourform {
            background: lightgrey;
            padding: 25px;
            box-shadow: 0 4px 5px rgba(0, 0, 0, 0.5);
        }

        .form-group label {
            color: #0E0E0E;
            font-weight: 600;
        }

        .form-group .form-control {
            font-size: 14px;
        }

        /* ADD CATEGORY */
        .radio {
            padding: 3px 0;
        }

        .radio input[type="radio"] {
            margin-right: 8px;
        }

        /* ADMIN LOGIN */
        #wrapper-admin {
            padding: 100px 0 0;
        }

        .border.border-danger {
            border: 5px solid #193a6f !important;
            opacity: 0.9;
            margin: 0 0 20px;
        }

        .heading {
            font-size: 20px;
            margin: 0 0 20px;
            display: inline-block;
            position: relative;
        }

        .heading:after {
            content: "";
            background: #193a6f;
            width: 100%;
            height: 2px;
            position: absolute;
            left: 0;
            bottom: -10px;
        }

        /* MODAL BOX */
        #modal {
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
        }

        #modal-form {
            background: #fff;
            width: 30%;
            position: relative;
            top: 20%;
            left: calc(50% - 15%);
            padding: 15px;
            border-radius: 4px;
        }

        #modal-form h2 {
            margin: 0 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #000;
            display: block;
        }

        #close-btn {
            background: #193a6f;
            color: #fff;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            position: absolute;
            top: -15px;
            right: -15px;
            cursor: pointer;
        }

        .card-body {
            background: #193a6f;
            opacity: 0.9;
            padding: 40px 20px;
        }

        .card-body .card-text {
            color: #fff;
            font-size: 40px;
            font-weight: 600;
            line-height: 40px;
            margin: 0 0 10px;
        }

        .card-body .card-title {
            color: #fff;
        }

        #modal-form table tr {
            border-bottom: 1px solid grey;
        }
    </style>
</head>

<body>
    <div id="header">
        <!-- HEADER -->
        <div class="container">
            <div class="row">
                <div class="offset-md-12 col-md-12">
                    <br>
                    <center>
                        <h1><strong>Library Management System</strong></h1>
                    </center>
                    <br>


                </div>
            </div>
        </div>
    </div> <!-- /HEADER -->
    <div id="menubar">
        <!-- Menu Bar -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="menu">
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('/authors') }}">Authors</a></li>
                        <li><a href="{{ url('/categories') }}">Categories</a></li>
                        <li><a href="{{ url('/books') }}">Books</a></li>
                        <li><a href="{{ url('/profiles') }}">Profiles</a></li>
                        <li><a href="{{ url('/book_issued') }}">Book Issue</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- /Menu Bar -->

    @yield('content')

    {{-- <!-- FOOTER -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span></a></span>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /FOOTER -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
