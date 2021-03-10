<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'MainController@index'); - laravel before 8 version
Route::get( '/',                [MainController::class,      'index']);
Route::get( '/contacts',        [MainController::class,      'contacts'])->middleware('auth');
Route::post('/contacts',        [MainController::class,      'getContacts']);
Route::get( '/reviews',         [ReviewController::class,    'reviews'])->name('review');
Route::post('/reviews',         [ReviewController::class,    'saveReview']);
Route::get( '/news',            [NewsController::class,      'news']);
//Route::get( '/blog',            [BlogController::class,      'index']);
Route::get( '/portfolio',       [PortfolioController::class, 'portfolio']);

Route::get( '/category/{slug}',         [BlogController::class,  'category']);
Route::get( '/article/{article:slug}',  [BlogController::class,  'article']);

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
   Route::get('/',  [AdminController::class,  'index']);  

   Route::resource('/category', CategoryController::class); 
   Route::resource('/article',  ArticleController::class); 
   Route::resource('/slider',   SliderController::class);   
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
   \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

 