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

Route::get('/', 'PagesController@bookmarks')->name('pages_bookmarks');
Route::get('bookmarks/goto/{bookmark}', 'BookmarksController@goTo')->name('admin.bookmarks_goto');

Route::prefix('admin')->group(function () {

    Route::get('/', 'PagesController@dashboard')->name('admin.pages_dashboard');

    Route::group(['prefix' => 'bookmarks'], function() {
        Route::get('/', 'BookmarksController@index')->name('admin.bookmarks_index');
        Route::get('add', 'BookmarksController@add')->name('admin.bookmarks_add');
        Route::get('edit/{bookmark}', 'BookmarksController@edit')->name('admin.bookmarks_edit');
        Route::get('search', 'BookmarksController@search')->name('admin.bookmarks_search');
        Route::get('latest', 'BookmarksController@latest')->name('admin.bookmarks_latest');
        Route::post('store', 'BookmarksController@store')->name('admin.bookmarks_store');
    });
    Route::get('bookmarks/delete/{bookmark}', 'BookmarksController@delete')->name('admin.bookmarks_delete');
    Route::get('tags', 'TagsController@index')->name('admin.tags_index');
    Route::get('tags/add', 'TagsController@add')->name('admin.tags_add');
    Route::get('tags/edit/{tag}', 'TagsController@edit')->name('admin.tags_edit');
    Route::get('tags/delete/{tag}', 'TagsController@delete')->name('admin.tags_delete');
    Route::post('tags/store', 'TagsController@store')->name('admin.tags_store');
    Route::get('categories', 'CategoriesController@index')->name('admin.categories_index');
    Route::get('categories/add', 'CategoriesController@add')->name('admin.categories_add');
    Route::get('categories/edit/{category}', 'CategoriesController@edit')->name('admin.categories_edit');
    Route::get('categories/delete/{category}', 'CategoriesController@delete')->name('admin.categories_delete');
    Route::post('categories/store', 'CategoriesController@store')->name('admin.categories_store');
    Route::get('clicks', 'ClicksController@index')->name('admin.clicks_index');

});
/*
.table {
        tr {
            &.is-selected:hover {
                background: $primary;
            }
        }
    }*/
