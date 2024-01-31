<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

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


// ===== Public Routes ===== //
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ===== Temporary Authentication Routes =====/
Route::get('demo', [ItemController::class, 'demo'])->name('demo');
Route::resource('items', ItemController::class);

// ===== Authentication Routes ===== //
Route::get('login', function () { return view('login'); })->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login.submit');
Route::get('sign-in/{user}', [AuthController::class , 'signIn'])->name('auth.sign-in');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('join-team', [AuthController::class, 'joinTeam'])->name('auth.team');

// ===== Authenticated Routes ===== //
Route::middleware([auth::class])->group(function () {
    Route::get('home', function () {
        return view('home');
    })->name('home');
    Route::get('get-code/{team}/{time}', [AuthController::class, 'getCode'])->name('auth.generate.code');
    Route::get('mapCache', [CacheController::class, 'map'])->name('mapCache');
});