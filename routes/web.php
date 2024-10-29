<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TownshipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;


Route::get('user_header', function () {
    return view('user_side.user_header');
});
Route::get('/user_home', [PropertyController::class, 'showFilter'])->name('user.home');
Route::post('/user_home/filter', [PropertyController::class, 'filterProperties'])->name('user.home.filter');
Route::get('/property/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property.details');

Route::get('owner_header', function () {
    return view('owner_side.owner_header');
});
Route::get('feedback', function () {
    return view('user_side.feedback');
});
Route::get('profile', function () {
    return view('user_side.profile');
});

Route::post('/getRegisterInfo', [AjaxController::class, 'getRegisterInfo']);


























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

require __DIR__ . '/auth.php';