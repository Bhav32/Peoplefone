<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('user/datatable', [UserController::class, 'datatable'])->name('user.datatable');
    Route::get('user/impersonate/{user}', [UserController::class, 'impersonate'])->name('user.impersonate');
    Route::resource('user', UserController::class)->names('user');
    
    Route::post('/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::resource('notifications',NotificationController::class)->names('notifications');

});
