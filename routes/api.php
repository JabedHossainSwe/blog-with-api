<?php
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware(['role:user'])->group(function () {
    Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('role:user');
    Route::put('/posts/{post}', 'PostController@update')->middleware('role:user');
});
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/posts', 'AdminController@managePosts')->middleware('role:admin');
});
