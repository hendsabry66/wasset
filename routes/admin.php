<?php
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Menueontroller;

Route::get('login', [UserController::class, 'login'])->name('admin.login');
Route::post('login', [UserController::class, 'postLogin'])->name('admin.postLogin');

Route::get('logout', [UserController::class, 'logout'])->middleware('auth');

Route::group(['middleware' => ['adminAuth']], function() {

    Route::resource('dashboard', DashboardController::class);

    Route::resource('countries', CountryController::class);
    Route::post('countries/bulk-delete', [CountryController::class, 'bulkDelete'])->name('countries.bulk-delete');


    Route::resource('cities', CityController::class);
    Route::post('cities/bulk-delete', [CityController::class, 'bulkDelete'])->name('cities.bulk-delete');
    Route::get('cities/cityAjax/{country_id}', [CityController::class, 'cityAjax'])->name('cities.cityAjax');

    Route::resource('categories', CategoryController::class);
    Route::post('categories/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('categories.bulk-delete');
    Route::get('categories/categoryAjax/{parent_id}', [CategoryController::class, 'categoryAjax'])->name('categories.categoryAjax');

    Route::resource('pages', PageController::class);
    Route::post('pages/bulk-delete', [PageController::class, 'bulkDelete'])->name('pages.bulk-delete');

    Route::resource('banners', BannerController::class);
    Route::post('banners/bulk-delete', [BannerController::class, 'bulkDelete'])->name('banners.bulk-delete');


    Route::resource('ads', AdController::class);
    Route::post('ads/bulk-delete', [AdController::class, 'bulkDelete'])->name('ads.bulk-delete');


    Route::resource('contacts', ContactController::class);
    Route::post('contacts/bulk-delete', [ContactController::class, 'bulkDelete'])->name('contacts.bulk-delete');


    Route::resource('settings', SettingController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/{setting_group}', [SettingController::class, 'update'])->name('settings.update');


    Route::resource('users', UserController::class);
    Route::post('users/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulk-delete');

    Route::resource('roles', RoleController::class);

    Route::get('menue', [Menueontroller::class, 'index'])->name('menue.index');

});

