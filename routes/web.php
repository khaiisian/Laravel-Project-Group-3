<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\UserPostController;
use App\Models\UserPost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyStoreController;
use App\Http\Controllers\SelectionTypeController;
use App\Models\Property;
use App\Models\Region;

Route::get('/admin/transactions', [TransactionController::class, 'show']);


// Register ajax route
Route::post('/getRegisterInfo', [AjaxController::class, 'getRegisterInfo']);



// Route able access before login
Route::get('/', [PropertyController::class, 'showFilter'])->name('home');
Route::post('/user_home/filter', [PropertyController::class, 'filterProperties'])->name('user.home.filter');
Route::get('/property/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property.details');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('user.feedback');
Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('user.feedback.store');
Route::get('/selection', [PropertyController::class, 'goToSelectionType'])->name('user.selection-type');

Route::get('contact', function () {
    return view('user_side.contactus');
});
Route::get('/user_post', function () {
    return view('user_side.user-post');
})->name('user_post');






// Route able to access after login
Route::middleware('auth')->group(function () {
    // Route::get('owner_header', function () {
    //     return view('owner_side.owner_header');
    // });
    Route::get('profile', function () {
        return view('user_side.profile');
    });
    Route::get('userprofile', function () {
        return view('user.userprofile');
    });
});



Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('/property/store', [PropertyController::class, 'store'])->name('property.store');
Route::get('/property/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property.details');
Route::get('/user/post', [PropertyController::class, 'userPost'])->name('userpost');
Route::get('/user/filter', [PropertyController::class, 'userFilter'])->name('userfilter');
Route::get('/filter', [PropertyController::class, 'filterProperties'])->name('filter.properties');
// Route::get('/admin/properties', [PropertyController::class, 'showProperties']);
// Route::get('/admin/property-types', [PropertyTypeController::class, 'showPropertyType'])->name('admin.property-types');
Route::get('/admin/townships', [TownshipController::class, 'showTownships']);
// route for store Property.




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user_home', [PropertyController::class, 'showFilter'])->name('user.home');
    Route::post('/user_home/filter', [PropertyController::class, 'filterProperties'])->name('user.home.filter');
    Route::get('/user_post', [UserPostController::class, 'create'])->name('userpost.create');
    Route::post('/userpost/store', [UserPostController::class, 'store'])->name('userpost.store');
    Route::get('/view', [UserPostController::class, 'show'])->name('userpost.view');
    Route::get('/detail/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property.details');
    Route::post('/detail/contact', [TransactionController::class, 'contactOwner'])->name('user.contact.owner');
    Route::post('/owner-post', [PropertyStoreController::class, 'store'])->name('user_side.owner-post');
    Route::get('/owner-post', [PropertyStoreController::class, 'show'])->name('owner.show');
    Route::get('/owner-noti', [TransactionController::class, 'goToNotiPage'])->name('user_side.owner-noti');

});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin_home', [AdminHomeController::class, 'showDashboard'])->name(name: 'admin_home');
    Route::get('/properties', [PropertyController::class, 'showProperty'])->name('admin.properties');
    Route::get('/property-types', [PropertyTypeController::class, 'showPropertyType'])->name('admin.property-types');
    Route::post('property-types', [PropertyTypeController::class, 'store'])->name('property-types.store');
    Route::delete('property-types/{id}', [PropertyTypeController::class, 'destroy'])->name('property-types.destroy');
    
    Route::get('/region', [RegionController::class, 'goToRegion'])->name('admin.region');
    Route::post('region', [RegionController::class, 'store'])->name('region.store');
    Route::delete('region/{id}', [RegionController::class, 'destroy'])->name('region.destroy');


    Route::get('/selection-type', [SelectionTypeController::class, 'show'])->name('selection-type.show');
    Route::post('/selection-type', [SelectionTypeController::class, 'store'])->name('selection-type.store');
    Route::delete('/selection-type/{id}', [SelectionTypeController::class, 'destroy'])->name('selection-type.destroy');

    Route::get('/townships', [TownshipController::class, 'showTownships'])->name('admin.townships');
    Route::post('/townships', [TownshipController::class, 'store'])->name('townships.store');
    Route::delete('/townships/{id}', [TownshipController::class, 'destroy'])->name('townships.destroy');

});








require __DIR__ . '/auth.php';