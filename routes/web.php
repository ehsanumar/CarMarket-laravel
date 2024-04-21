<?php

use App\Models\Cars;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SearchAndSearchController;
use App\Models\Sales;


Route::resource('cars', CarsController::class);

Route::get('/', function () {
    $cars = Cars::with('user')->latest()->take(8)->get();
    return view('welcome',compact('cars'));
});

Route::get('/dashboard', function () {

    $carsMe = Cars::where('user_id', auth()->id())->latest()->get();
    $salesCount = Sales::count();
    $UserCount = User::count();
    $CarCount = Cars::count();
    return view('dashboard', compact(['carsMe','salesCount','UserCount','CarCount']));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // ------------

    Route::resource('comments', CommentsController::class);
});

Route::group(['middleware' => ['role:super-admin', 'auth']], function () {
    Route::get('/guests',[UserController::class,'guests'])->name('guests');
    Route::get('/seller',[UserController::class,'seller'])->name('seller');
    Route::get('/buyer',[UserController::class,'buyer'])->name('buyer');
    Route::get('/cars',[UserController::class,'cars'])->name('cars');
    Route::put('/user/update/{id}',[UserController::class,'updateRole'])->name('updateRole');
    Route::delete('/user/destroy/{id}',[UserController::class,'destroy'])->name('destroy');


});

Route::resource('sales', SalesController::class);
Route::get('/search/car', [SearchAndSearchController::class, 'searchCar'])->name('searchCar');
Route::get('/sort/car', [SearchAndSearchController::class, 'sortCar'])->name('sortCar');


require __DIR__.'/auth.php';
