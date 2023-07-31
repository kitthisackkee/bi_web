<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CatalogApiController;
use App\Http\Controllers\Api\SlideApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ServiceApiController;

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

Route::resource('/slide', SlideApiController::class);
Route::resource('/courses', ServiceApiController::class);
Route::resource('/about', App\Http\Controllers\Api\PageApiController::class);
Route::resource('/pages', App\Http\Controllers\Api\PageApiController::class);
Route::resource('/news', App\Http\Controllers\Api\NewsApiController::class);

Route::get('/news_by_category/{id}', [App\Http\Controllers\Api\NewsApiController::class,'news_by_category']);
Route::get('/all_news_category', [App\Http\Controllers\Api\NewsApiController::class,'all_news_category']);
Route::resource('/documents', App\Http\Controllers\Api\DocumentsApiController::class);
Route::get('/documents_type', [App\Http\Controllers\Api\DocumentsApiController::class,'documents_type']);
Route::get('/contact', [App\Http\Controllers\Api\PageApiController::class,'contact']);

Route::post('/register',[App\Http\Controllers\Api\Auth\AuthApiController::class, 'register']);
Route::post('/login',[App\Http\Controllers\Api\Auth\AuthApiController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/books', [App\Http\Controllers\Api\BookApiController::class, 'index']);
    Route::get('/booktypes', [App\Http\Controllers\Api\BookApiController::class, 'create']);
    Route::get('/user', [App\Http\Controllers\Api\Auth\AuthApiController::class, 'user']);
    Route::post('/user/update', [App\Http\Controllers\Api\Auth\AuthApiController::class, 'update']);
    Route::post('/logout', [App\Http\Controllers\Api\Auth\AuthApiController::class, 'logout']);
});
