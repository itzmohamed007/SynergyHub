<?php

use App\Models\User;
use App\Models\Idea;
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

// Route::post('/utilisateur/inscription', [UserController::class, 'inscription']);

// read (GET)
Route::get('/user/get', function () {
    return User::all();
});

// create (POST)
Route::post('user/insert', function () {
    return User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => request('password')
    ]);
});

// update (PUT)
Route::put('user/update/{user}', function (User $user) {
    $user->update([
        'name' => request('name'),
        'email' => request('email'),
        'password' => request('password')
    ]);

    return response()->json($user, 200);
});

// delete (DELETE)
Route::delete('user/delete/{user}', function (User $user) {
    $success = $user->delete();

    if ($success) {
        return response()->json('Post Deleted Successfully', 200);
    } else {
        return response()->json('Delete Failed', 400);
    }
});





// read (GET)
Route::get('/idea/get', function () {
    return Idea::all();
});

// create (POST)
Route::post('idea/insert', function () {
    return Idea::create([
        'user_id' => request('user_id'),
        'title' => request('title'),
        'description' => request('description'),
        'files' => request('files'),
        'categorie' => request('categorie'),
    ]);
});

// update (PUT)
Route::put('idea/update/{idea}', function (Idea $idea) {
    $idea->update([
        'user_id' => request('user_id'),
        'title' => request('title'),
        'description' => request('description'),
        'files' => request('files'),
        'categorie' => request('categorie'),
    ]);

    return response()->json($idea, 200);
});

// delete (DELETE)
Route::delete('idea/delete/{idea}', function (Idea $idea) {
    $success = $idea->delete();

    if ($success) {
        return response()->json('Post Deleted Successfully', 200);
    } else {
        return response()->json('Delete Failed', 400);
    }
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
