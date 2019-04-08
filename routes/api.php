<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v0'], function() {
    Route::group(['prefix' => 'bookmarks'], function() {
        Route::get('/', 'BookmarksController@apiIndex')->name('api.bookmarks_index');
        Route::get('latest', 'BookmarksController@apiLatest')->name('api.bookmarks_latest');
    });

    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', 'TagsController@apiIndex')->name('api.tags_index');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', 'CategoriesController@apiIndex')->name('api.categories_index');
    });
});
