<?php

use App\Http\Livewire\Back\FriendsController;
use App\Http\Livewire\Back\SocialiteConnexion;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/user/{id}', [FriendsController::class ,'friendRequest'])->name('add_to_friends');
    });
});

Route::get('/auth/{slug}', [SocialiteConnexion::class, 'socialiteRedirect'])->name('socialite.redirect');
Route::get('/auth/{slug}/callback', [SocialiteConnexion::class, 'socialiteCallback']);
