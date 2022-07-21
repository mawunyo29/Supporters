<?php

use App\Http\Livewire\Back\FriendsController;
use App\Http\Livewire\Back\SocialiteConnexion;
use App\Http\Livewire\Searchs\SearchController;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        return view('dashboard',compact('user'));
    })->name('dashboard');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/user/{id}', [FriendsController::class ,'sendRequest'])->name('add_to_friends');
        Route::get('/search/{id}', [SearchController::class ,'sendInvitation'])->name('send_request');
        Route::get('/notify', [FriendsController::class ,'getUnReadnotifications'])->name('notifications');
    });
});

Route::get('/auth/{slug}', [SocialiteConnexion::class, 'socialiteRedirect'])->name('socialite.redirect');
Route::get('/auth/{slug}/callback', [SocialiteConnexion::class, 'socialiteCallback']);
