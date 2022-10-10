<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AdController;
use App\Http\Controllers\Web\UserController;
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
    Route::get('/', [AdController::class, 'index']);
    Route::get('ad/create', [AdController::class, 'adCreate'])->middleware('auth');
    Route::post('ad/store', [AdController::class, 'adStore'])->middleware('auth');
    Route::get('ads/{category_id}', [AdController::class, 'ads']);
    Route::get('adDetails/{id}', [AdController::class, 'adDetails']);
    Route::get('search', [AdController::class, 'search']);
    Route::get('contactUs', [AdController::class, 'contactUs']);
    Route::get('userProfile/{user_id}', [userController::class, 'userProfile']);
    Route::post('rateUser', [userController::class, 'rateUser'])->middleware('auth');
});
