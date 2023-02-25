<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\User;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public Routes
    // Authentification
    Route::post('/register', [AuthController::class, 'register']); // Register
    Route::post('/login', [AuthController::class, 'login']); // Login

    // Read Ideas
    Route::get('/ideas', [IdeaController::class, 'index']); // Read
    Route::get('/ideas/{id}', [IdeaController::class, 'show']); // Read Single
    Route::get('/ideas/search/{name}', [IdeaController::class, 'search']); // Search

    // Read Comments
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/comments/search/{idea_id}', [CommentController::class, 'search']); // Search

    // Read Likes
    Route::get('/likes/search/{idea_id}', [LikeController::class, 'search']); // Search




// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function() {

    // Crud Ideas
    Route::post('/ideas', [IdeaController::class, 'store']); // Create
    Route::put('/ideas/{id}', [IdeaController::class, 'update']); // Update
    Route::delete('/ideas/{id}', [IdeaController::class, 'destroy']); // Delete
    Route::post('/logout', [AuthController::class, 'logout']); // Logout

    // Crud Comments
    Route::post('/comments', [CommentController::class, 'store']); // Create
    Route::delete('/comments/{id}/{user_id}', [CommentController::class, 'destroy']); // Delete

    // Crud Likes
    Route::get('/likes', [LikeController::class, 'index']); // Read
    Route::post('/likes', [LikeController::class, 'store']); // Create
    Route::delete('/likes/{id}/{user_id}/{idea_id}/{comment_id}', [LikeController::class, 'destroy']); // Delete
});