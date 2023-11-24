<?php 
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Dashboard
    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');

    // Post routes
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});

// Authentication routes generated by Jetstream
Auth::routes();

// Example of the default home route generated by Laravel
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
