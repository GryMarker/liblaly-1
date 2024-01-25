<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\dashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin');
})->middleware('guest');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/Change-password', [LoginController::class, 'changePassword'])->name('change_password');
Route::view('/dashboard', 'dashboard');
Route::view('/authors', 'author.index');
Route::view('/categories', 'category.index');
Route::view('/books', 'book.index');
Route::view('/profiles', 'profile.index');
Route::view('/book_issued', 'book.issueBooks');
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index');




Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::get('/profile/edit/{student}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::post('/profile/create', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/show/{id}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::get('/authors/edit/{author}', [AuthorController::class, 'edit'])->name('authors.edit');
Route::post('/authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::post('/authors/delete/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
Route::post('/authors/create', [AuthorController::class, 'store'])->name('authors.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::post('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::resource('book', BookController::class);



Route::get('/book_issue', [BookIssueController::class, 'index'])->name('book_issued');
Route::get('/book-issue/create', [BookIssueController::class, 'create'])->name('book_issue.create');
Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/book-issue/update/{id}', [BookIssueController::class, 'update'])->name('book_issue.update');
Route::post('/book-issue/delete/{id}', [BookIssueController::class, 'destroy'])->name('book_issue.destroy');
Route::post('/book-issue/create', [BookIssueController::class, 'store'])->name('book_issue.store');

Route::get('/issueBooks', [BookIssueController::class, 'index'])->name('issueBooks');
Route::get('/issueBook_add', [BookIssueController::class, 'create'])->name('issueBook_add');
Route::post('/issueBook_add', [BookIssueController::class, 'store']); // Assuming you use a POST request to store data
Route::get('/issueBooks', [BookIssueController::class, 'showIssueBooks'])->name('issueBooks');
Route::resource('book_issue', BookIssueController::class);
Route::get('/your/path', [BookIssueController::class, 'create'])->name('book_issued');
Route::post('/book_issue/create', [BookIssueController::class, 'create'])->name('book_issue.create');
Route::get('/book/issueBooks', 'BookIssueController@index')->name('book.issueBooks');
Route::post('/book/issueBooks', 'BookIssueController@store');
Route::get('/book/issueBooks', [BookIssueController::class, 'index'])->name('book.issueBooks');
Route::post('/book/issueBooks', [BookIssueController::class, 'store']);


// Route::get('/', function () {
//     return view('home');
// })->middleware('guest');
// Route::post('/', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/Change-password', [LoginController::class, 'changePassword'])->name('change_password');


 Route::middleware('auth')->group(function () {
     Route::get('change-password',[dashboardController::class,'change_password_view'])->name('change_password_view');
    Route::post('change-password',[dashboardController::class,'change_password'])->name('change_password');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
