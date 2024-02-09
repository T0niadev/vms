<?php

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
Route::get('/dashboard', [\App\Http\Controllers\BookingController::class, 'dashboard'])->name('dashboard');

Route::get('/rooms', [\App\Http\Controllers\RoomController::class, 'index'])->name('rooms');
Route::get('/create/rooms', [\App\Http\Controllers\RoomController::class, 'create'])->name('createroom');
Route::post('/room/store', [\App\Http\Controllers\RoomController::class, 'store'])->name('storeroom');
Route::get('/edit/room/{room}', [\App\Http\Controllers\RoomController::class, 'edit'])->name('editroom');
Route::put('/room/update/{room}', [\App\Http\Controllers\RoomController::class, 'update'])->name('updateroom');

Route::get('/visitors', [\App\Http\Controllers\VisitorController::class, 'index'])->name('visitors');
Route::get('/create/visitors', [\App\Http\Controllers\VisitorController::class, 'create'])->name('createvisitor');
Route::get('/edit/visitor/{visitor}', [\App\Http\Controllers\VisitorController::class, 'edit'])->name('editvisitor');
Route::post('/visitor/store', [\App\Http\Controllers\VisitorController::class, 'store'])->name('storevisitor');
Route::put('/visitor/update/{visitor}', [\App\Http\Controllers\VisitorController::class, 'update'])->name('updatevisitor');


Route::get('/bookings', [\App\Http\Controllers\BookingController::class, 'index'])->name('bookings');
Route::get('/events', [\App\Http\Controllers\BookingController::class, 'event'])->name('event');
Route::get('/create/bookings', [\App\Http\Controllers\BookingController::class, 'create'])->name('createbooking');
Route::get('/edit/booking/{booking}', [\App\Http\Controllers\BookingController::class, 'edit'])->name('editbooking');
Route::post('/booking/store', [\App\Http\Controllers\BookingController::class, 'store'])->name('storebooking');
Route::put('/update/booking/{id}', [\App\Http\Controllers\BookingController::class, 'update'])->name('updatebooking');
Route::delete('/delete/booking/{id}', [\App\Http\Controllers\BookingController::class, 'delete'])->name('delete');

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/create/users', [\App\Http\Controllers\UserController::class, 'create'])->name('createuser');
Route::get('/edit/user/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('edituser');
Route::post('/user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('storeuser');
Route::put('/user/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('updateuser');
