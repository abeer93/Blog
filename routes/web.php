<?php

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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

// Authenticate routes
Route::middleware(['auth'])->group(function () {
    // web app routes
    Route::group(['prefix' => 'web', 'namespace' => 'App\Web'], function () {
        Route::get('articles', 'ArticleController@index')->name('web.articles.index');
        Route::post('articles/{articleId}/comment', 'ArticleController@createComment')->name('web.article.create.comment');
    });

    // admin dashboard routes
    Route::group(['prefix' => 'dashboard/admin', 'namespace' => 'Admin'], function () {
        Route::resource('categories', 'CategoryController');
        Route::resource('articles', 'ArticleController');
    });
});


