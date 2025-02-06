<?php

use App\Models\Post;
use App\models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use PHPUnit\Framework\Attributes\PostCondition;

Route::get('/', function () {
    $posts=[];
    // Retrieve posts only for the logged-in user
    //$posts  = Auth::user()->UserCoolPosts()->latest()->get();
    //$posts = Post::where('user_id', Auth::id())->get();
    if (auth::check()){
        $posts  = Auth::user()->UserCoolPosts()->latest()->get();
    }
    // Pass the posts to the view
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [Usercontroller::class, 'logout']);
Route::post('/login', [ Usercontroller::class, 'login']);

//post controller routes below
Route::post('/create-post', [PostController::class, 'createPost']);

Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
 Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);