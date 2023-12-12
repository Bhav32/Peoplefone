<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;

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

Auth::routes();

/*Route::get('/', function () {
    // If the user is authenticated, redirect to the home page
    if (Auth::check()) {
        return redirect()->route('home');
    }

    // If not authenticated, show the registration view
    return view('auth.register');
});*/


Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class)->names('user');
    Route::resource('notifications',NotificationController::class)->names('notifications');

});
