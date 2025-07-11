<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Web\AccomodationController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\DifficultyLevelController;
use App\Http\Controllers\Web\PackageDetailController;
use App\Http\Controllers\Web\PackageFaqController;
use App\Http\Controllers\Web\PackageInclusionController;
use App\Http\Controllers\Web\PackageItineraryController;
use App\Http\Controllers\Web\RolesController;
use App\Http\Controllers\Web\ServiceRegionController;
use App\Http\Controllers\Web\ServiceTypeController;
use App\Http\Controllers\Web\UserController;


Route::prefix('/')
    ->name('/.')
    ->group(function () {
        Route::get('detail/{slugURL}', [ClientController::class, 'detail'])->name('detail');
        Route::get('search/{id}', [ClientController::class, 'search'])->name('search');
        Route::get('searchAjax/{id}', [ClientController::class, 'searchAjax'])->name('searchAjax');
    });

//Client Routes
Route::get('/', [ClientController::class, 'index']);

//TODO: Update url based on slug of package/service region eg: /package-list/{slug}
Route::get('package-list', [ClientController::class, 'packageList']);
Route::get('about-us', [ClientController::class, 'aboutUs']);
Route::get('privacy-policy', [ClientController::class, 'privacyPolicy']);


//Dashboard Routes
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

Route::group(['prefix' => 'account'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('index', [DashboardController::class, 'index'])->name('account.dashboard');
        // routes/web.php
    });
});

Route::get('userprofile', [UserController::class, 'showuserprofile'])->name('userprofile');
Route::get('Adduser', [UserController::class, 'Adduser'])->name('Adduser');

Route::get('roles', [RolesController::class, 'ViewRoles'])->name('roles');
Route::get('addroles', [RolesController::class, 'viewAddRoles'])->name('addroles');
Route::post('addroles', [RolesController::class, 'storeroles'])->name('roles.store');
Route::get('/delete/{id}', [RolesController::class, 'deleteroles']);
Route::get('/roles/{id}', [RolesController::class, 'ViewEditRoles'])->name('EditRoles');
Route::post('/roles/{id}', [RolesController::class, 'EditRoles'])->name('EditRoles');
Route::get('/roless/{id}', [RolesController::class, 'activeRoles']);


Route::prefix('DifficultyLevel')->name('DifficultyLevel.')->group(function () {
    Route::get('/', [DifficultyLevelController::class, 'index'])->name('index');
    Route::get('/create', [DifficultyLevelController::class, 'create'])->name('create');
    Route::post('/', [DifficultyLevelController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [DifficultyLevelController::class, 'edit'])->name('edit');
    Route::put('/{id}', [DifficultyLevelController::class, 'update'])->name('update');
    Route::get('/{id}', [DifficultyLevelController::class, 'delete'])->name('delete');
});

Route::prefix('Accomodation')->name('Accomodation.')->group(function () {
    Route::get('/', [AccomodationController::class, 'index'])->name('index');
    Route::get('/create', [AccomodationController::class, 'create'])->name('create');
    Route::post('/', [AccomodationController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AccomodationController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AccomodationController::class, 'update'])->name('update');
    Route::get('/{id}', [AccomodationController::class, 'delete'])->name('delete');
});

Route::prefix('Category')->name('Category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('/{id}', [CategoryController::class, 'delete'])->name('delete');
});


Route::prefix('ServiceType')->name('ServiceType.')->group(function () {
    Route::get('/', [ServiceTypeController::class, 'index'])->name('index');
    Route::get('/create', [ServiceTypeController::class, 'create'])->name('create');
    Route::post('/', [ServiceTypeController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ServiceTypeController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ServiceTypeController::class, 'update'])->name('update');
    Route::get('/{id}', [ServiceTypeController::class, 'delete'])->name('delete');
});


Route::prefix('ServiceRegion')->name('ServiceRegion.')->group(function () {
    Route::get('/', [ServiceRegionController::class, 'index'])->name('index');
    Route::get('/create', [ServiceRegionController::class, 'create'])->name('create');
    Route::post('/', [ServiceRegionController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ServiceRegionController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ServiceRegionController::class, 'update'])->name('update');
    Route::get('/{id}', [ServiceRegionController::class, 'delete'])->name('delete');

    // FAQ Routes inside ServiceRegion
    Route::prefix('{service_region}/faqs')->name('faqs.')->group(function () {
        Route::post('/', [ServiceRegionController::class, 'storeFAQ'])->name('store');
        Route::put('/{faq}', [ServiceRegionController::class, 'updatefaq'])->name('update');
        // Route::delete('/{faq}', [ServiceRegionController::class, 'destroy'])->name('destroy');
        Route::get('/form/{faq?}', [ServiceRegionController::class, 'faqForm'])->name('form');
    });
});

Route::prefix('PackageDetail')->name('PackageDetail.')->group(function () {
    Route::get('/', [PackageDetailController::class, 'index'])->name('index');
    Route::get('/create', [PackageDetailController::class, 'create'])->name('create');
    Route::post('/', [PackageDetailController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PackageDetailController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PackageDetailController::class, 'update'])->name('update');
    Route::get('/{id}/Image', [PackageDetailController::class, 'Image'])->name('Image');
    Route::post('/{id}/uploadImage', [PackageDetailController::class, 'uploadImage'])->name('uploadImage');
    Route::get('/{id}/edit', [PackageDetailController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PackageDetailController::class, 'update'])->name('update');

    //Package Itinerary
    Route::prefix('{package_id}/itinerary')->name('itinerary.')->group(function () {
        Route::get('/', [PackageItineraryController::class, 'index'])->name('index');
        Route::post('/', [PackageItineraryController::class, 'store'])->name('store');
        Route::put('/{id}', [PackageItineraryController::class, 'update'])->name('update');
        // Route::delete('/{faq}', [ServiceRegionController::class, 'destroy'])->name('destroy');
        Route::get('/form/{id?}', [PackageItineraryController::class, 'itineraryForm'])->name('form');
    });

    Route::prefix('{package_id}/faqs')->name('faqs.')->group(function () {
        Route::get('/', [PackageFaqController::class, 'index'])->name('index');
        Route::post('/', [PackageFaqController::class, 'store'])->name('store');
        Route::put('/{faq}', [PackageFaqController::class, 'update'])->name('update');
        Route::get('/faqForm/{faq?}', [PackageFaqController::class, 'faqForm'])->name('faqForm');
    });

    Route::prefix('{package_id}/inclusion')->name('inclusion.')->group(function () {
        Route::get('/', [PackageInclusionController::class, 'index'])->name('index');
        Route::post('/', [PackageInclusionController::class, 'store'])->name('store');
        Route::put('/{id}', [PackageInclusionController::class, 'update'])->name('update');
        Route::get('/inclusionForm/{id?}', [PackageInclusionController::class, 'inclusionForm'])->name('inclusionForm');
    });
});
