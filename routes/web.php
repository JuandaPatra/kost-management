<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/house', function(){
//     return view('admin.house.index');
// })->name('house');

Route::get('/book', function(){
    return view('admin.booking.index');
})->name('book');

Route::get('/house/collections', [HouseController::class, 'houseCollections'])->name('house.collection');
Route::get('/house/room/{id}', [HouseController::class,'addRoom'])->name('house.addRoom');
Route::post('/house/room/{id}', [HouseController::class,'addRoomItem'])->name('house.addRoomItem');

Route::get('/room', [HouseController::class,'room'])->name('room.all');
Route::get('/room/collections', [HouseController::class, 'roomCollection'])->name('room.collection');
Route::get('/room/rented/{id}', [HouseController::class, 'rented'])->name('room.rented');
Route::post('/room/rented/{id}', [HouseController::class, 'rentedSend'])->name('room.rentedSend');
Route::resource('house', HouseController::class);

Route::resource('booking', BookingController::class);

Route::get('/customer/collections', [CustomerController::class, 'customerCollection'])->name('customer.collections');
Route::resource('customer', CustomerController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
