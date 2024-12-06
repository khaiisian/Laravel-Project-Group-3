<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\UserPostController;
use App\Models\UserPost;
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
Route::get('userprofile', function () {
    return view('user.userprofile');
});
Route::get('contact', function () {
    return view('user_side.contactus');
});
Route::get('user_post', function () {
    return view('user_side.userpost');
});

Route::post('/getRegisterInfo', [AjaxController::class, 'getRegisterInfo']);


Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('/property/store', [PropertyController::class, 'store'])->name('property.store');
Route::get('/property/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property.details');
Route::get('/user/post', [PropertyController::class, 'userPost'])->name('userpost');
Route::get('/user/filter', [PropertyController::class, 'userFilter'])->name('userfilter');
Route::get('/filter', [PropertyController::class, 'filterProperties'])->name('filter.properties');
Route::get('/admin/properties', [PropertyController::class, 'showProperties']);
Route::get('/admin/property-types', [PropertyTypeController::class, 'showPropertyType'])->name('admin.property_types');
Route::get('/admin/townships', [TownshipController::class, 'showTownships']);





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
    Route::get('/user_home', [PropertyController::class, 'showFilter'])->name('user.home');
    Route::post('/user_home/filter', [PropertyController::class, 'filterProperties'])->name('user.home.filter');
    Route::get('/property/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property.details');
    Route::get('/user_post', [UserPostController::class, 'create'])->name('userpost.create');
    Route::post('/userpost/store', [UserPostController::class, 'store'])->name('userpost.store');
});

require __DIR__ . '/auth.php';