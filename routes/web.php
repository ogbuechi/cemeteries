<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\CementeriesController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\FlavorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemorialsController;
use App\Http\Controllers\MenuCategoriesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PagesControler;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\SidesController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('index');

//    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

//PAGES
Route::get('/cemetery', [PagesControler::class, 'cemeteries'])->name('cemeteries');
Route::get('/cemeteries/list', [PagesControler::class, 'cemeteriesList'])->name('cemeteries.list');

Route::get('/memorials/listing', [PagesControler::class, 'memorials'])->name('memorials');
Route::get('/memorial/{memorial', [PagesControler::class, 'showMemorials'])->name('memorial.show');
Route::get('/famous/memorials', [PagesControler::class, 'famousMemorials'])->name('memorials.famous');

Route::get('/about', [PagesControler::class, 'about'])->name('about');
Route::get('/help', [PagesControler::class, 'help'])->name('help');
Route::get('/contact', [PagesControler::class, 'contact'])->name('contact');
Route::get('/terms_of_use', [PagesControler::class, 'terms'])->name('terms');
Route::get('/privacy', [PagesControler::class, 'privacy'])->name('privacy');

Route::get('/cemeteries/create', [CementeriesController::class, 'create'])->name('cemeteries.create');


Route::group(['middleware' => ['auth']], function () {


    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resources([
//        'restaurants' => HomeController::class,
        'cemeteries' => CementeriesController::class,
        'memorials' => MemorialsController::class,
    ]);

    Route::get('/memorial/photos/{id}', [MemorialsController::class, 'photos'])->name('memorials.photos');
    Route::post('/memorial/photos/store', [MemorialsController::class, 'storePhoto'])->name('memorials.photo.store');

    Route::get('/my/photos', [HomeController::class, 'photos'])->name('photos');


    Route::post('post/image', [ImageUploadController::class, 'postImage'])->name('api.post.image');

    Route::post('import/cemeteries', [CommonController::class, 'importCemeteries'])->name('import.cemeteries');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'cemeteries'], function () {
//    Route::get('/', 'CementeriesController@index')->name('cemeteries.cemetery.index');
//    Route::get('/create',CementeriesController@create)->name('cementeries.cementery.create');
    Route::get('/show/{cementery}','CementeriesController@show')->name('cementeries.cementery.show')->where('id', '[0-9]+');
    Route::get('/{cementery}/edit','CementeriesController@edit')->name('cementeries.cementery.edit')->where('id', '[0-9]+');
    Route::put('cementery/{cementery}', 'CementeriesController@update')->name('cementeries.cementery.update')->where('id', '[0-9]+');
    Route::delete('/cementery/{cementery}','CementeriesController@destroy')->name('cementeries.cementery.destroy')->where('id', '[0-9]+');
});


@include('admin.php');


Route::get('/{username}', [PagesControler::class, 'viewCemetery'])->name('cemetery.show');

Route::group([
    'prefix' => 'memorial',
], function () {
    Route::get('/', 'MemorialsController@index')
         ->name('memorials.memorial.index');
    Route::get('/create','MemorialsController@create')
         ->name('memorials.memorial.create');
    Route::get('/show/{memorial}','MemorialsController@show')
         ->name('memorials.memorial.show')->where('id', '[0-9]+');
    Route::get('/{memorial}/edit','MemorialsController@edit')
         ->name('memorials.memorial.edit')->where('id', '[0-9]+');
    Route::post('/', 'MemorialsController@store')
         ->name('memorials.memorial.store');
    Route::put('memorial/{memorial}', 'MemorialsController@update')
         ->name('memorials.memorial.update')->where('id', '[0-9]+');
    Route::delete('/memorial/{memorial}','MemorialsController@destroy')
         ->name('memorials.memorial.destroy')->where('id', '[0-9]+');
});