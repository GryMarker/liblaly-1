<?php

// DashboardController.php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Profile;
use App\Models\Book_issue;

class dashboardController extends Controller
{
    public function index()
    {
        $authorCount = Author::count();
        $categoryCount = Category::count();
        $bookCount = Book::count();
        $profileCount = Profile::count();
        $bookIssueCount = Book_issue::count();

        return view('dashboard', compact(
            'authorCount',
            'categoryCount',
            'bookCount',
            'profileCount',
            'bookIssueCount'
        ));
    }
}
