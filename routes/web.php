<?php

use App\Http\Controllers\AuthController;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class,'index']);

Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->where('blog','[A-z\d\-_]+');

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');



// Route::get('/categories/{category:slug}',function(Category $category){
//  return view('blogs',[
//     'blogs'=>$category->blogs,
//     'categories'=>Category::all(),
//     'currentCategory'=>$category
//     ]);
// });

// Route::get('/users/{user:username}',function(User $user){
//     return view('blogs',[
//         'blogs'=>$user->blogs,

//     ]);
// });




