<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('user_header', function () {
    return view('user_side.user_header');
});
Route::get('user_home', function () {
    return view('user_side.user_home');
});
Route::get('owner_header', function () {
    return view('owner_side.owner_header');
});
Route::get('feedback', function () {
    return view('user_side.feedback');
});
Route::get('profile', function () {
    return view('user_side.profile');
});

// routes/web.php hla hla 

Route::get('/contact', function () {
    return view('user.contactus'); 
})->name('contact');

Route::get('/profile', function () {
    return view('user.userprofile'); 
})->name('profile');

// end 

























Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
