<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['role:user'])->group(function () {
    Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('role:user');
    Route::put('/posts/{post}', 'PostController@update')->middleware('role:user');
});
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/posts', 'AdminController@managePosts')->middleware('role:admin');
});
