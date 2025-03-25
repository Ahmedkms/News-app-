<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class,'home']);

Route::get('posts',[PostController::class,'index'])->name('post-index');
Route::get('posts/create',[PostController::class,'create'])->name('Post-create');

Route::post('post_store',[PostController::class,'store'])->name('post-store');

Route::get('edit-post/{id}',[PostController::class,'edit'])->name('edit-post');

Route::delete('post/{id}',[PostController::class,'destroy']);

Route::put('post-update/{id}',[PostController::class,'update']);
Route::get('posts/{id}',[PostController::class,'show'] );


Route::get('searchForPosts',[PostController::class,'search'])->name('search');

