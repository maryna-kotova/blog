<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get( '/',                       [MainController::class,      'index']);
Route::get( '/contacts',               [ContactController::class,   'contacts']);
Route::post('/contacts',               [ContactController::class,   'getContacts']);
Route::get( '/articles',               [BlogController::class,      'index']);
Route::get( '/reviews',                [ReviewController::class,    'reviews'])->name('review');
Route::post('/reviews',                [ReviewController::class,    'saveReview']);
Route::get( '/portfolio',              [PortfolioController::class, 'portfolio']);
Route::get( '/news',                   [NewsController::class,      'news']);
Route::get( '/category/{slug}',        [BlogController::class,      'category']);
Route::get( '/article/{article:slug}', [BlogController::class,      'article']);

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
   Route::get('/',  [AdminController::class,  'index']);  

   Route::resource('/category', CategoryController::class); 
   Route::resource('/article',  ArticleController::class);  
   
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
   \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
   return view('dashboard');
})->name('dashboard');

Route::get('/login/github',          [AuthController::class, 'redirect']);
Route::get('/login/github/callback', [AuthController::class, 'callback']);

