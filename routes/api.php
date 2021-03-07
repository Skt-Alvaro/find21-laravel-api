<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/////////PASSPORT/////////

Route::post('users/register', [UserController::class, 'register']);

Route::post('users/login', [UserController::class, 'login']);

Route::get('users/login', [UserController::class, 'login'])->name('login');

Route::resource('announcements', AnnouncementController::class);

Route::resource('user', UserController::class);

// Route::post('image/{id}', [ImageController::class, 'store'])->name('addImage');

Route::post('image/country', [CountryController::class, 'store']);

Route::get('image/country', [CountryController::class, 'index']);
