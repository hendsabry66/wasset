<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AdController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\FavouriteController;
use App\Http\Controllers\Web\MessageController;
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

//Route::get('/', function () {
//    return view('admin.layouts.master');
//});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    Auth::routes();
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', [AdController::class, 'index']);
    Route::get('ad/create', [AdController::class, 'adCreate'])->middleware('auth');
    Route::post('ad/store', [AdController::class, 'adStore'])->middleware('auth');
    Route::get('ads/{category_id}', [AdController::class, 'ads']);
    Route::get('adDetails/{id}', [AdController::class, 'adDetails']);
    Route::get('search', [AdController::class, 'search']);

    //favourites
    Route::get('favourites',[FavouriteController::class, 'favourites'])->middleware('auth');
    Route::post('addFavourite',[FavouriteController::class, 'addFavourite'])->middleware('auth');
    //contact us
    Route::get('contactUs', [HomeController::class, 'contactUs']);
    Route::post('postContactUs', [HomeController::class, 'postContactUs']);

    //user
    Route::get('myProfile', [UserController::class, 'myProfile'])->middleware('auth');
    Route::get('editProfile', [UserController::class, 'editProfile'])->middleware('auth');
    Route::post('postEditProfile', [UserController::class, 'postEditProfile'])->middleware('auth');
    Route::get('userProfile/{user_id}', [userController::class, 'userProfile']);
    Route::post('rateUser', [userController::class, 'rateUser'])->middleware('auth');


    //messages
    Route::get('conversations', [MessageController::class, 'conversations'])->middleware('auth');
    Route::get('conversation/{conversion_id}', [MessageController::class, 'conversation'])->middleware('auth');
    Route::get('sendMessage/{user_id}', [MessageController::class, 'getSendMessage'])->middleware('auth');
    Route::post('sendMessage', [MessageController::class, 'sendMessage'])->middleware('auth');
    Route::post('deleteMessage', [MessageController::class, 'deleteMessage'])->middleware('auth');
    Route::get('deleteConversation/{conversion_id}', [MessageController::class, 'deleteConversation'])->middleware('auth');
});
