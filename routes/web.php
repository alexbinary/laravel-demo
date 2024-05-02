<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('blogposts.index');
});

Route::resource('blogposts', BlogPostController::class);