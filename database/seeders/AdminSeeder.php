<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

// ...

// Create a new admin user
Admin::create([
    'username' => 'example_admin',
    'password' => Hash::make('secret_password'),
    // Other fields as needed
]);
