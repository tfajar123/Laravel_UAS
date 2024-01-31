<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabController;
use App\Http\Controllers\GuitarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Tab;
use App\Models\Guitar;

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
    return view('index', [
        'tabs' => Tab::latest()->paginate(6),
        'guitars' => Guitar::latest()->paginate(6)
    ]);
})->name('homeIndex');
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard/tablature', [DashboardController::class, 'tab'])->name('tablature');
Route::get('/dashboard/guitar', [DashboardController::class, 'guitar'])->name('gitar');
Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('user');

Route::controller(LoginController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/orders', [OrderController::class, 'index'])->name('order');
Route::post('/purchase', [OrderController::class, 'store'])->name('order.store');

Route::get('/tabs/search', [TabController::class, 'search']);
Route::resource('tabs', TabController::class);
Route::resource('guitars', GuitarController::class);
