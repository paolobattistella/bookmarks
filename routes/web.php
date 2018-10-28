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

Route::get('bookmarks', 'PagesController@bookmarks')->name('pages_bookmarks');

Route::prefix('admin')->group(function () {

    Route::get('/', 'PagesController@dashboard')->name('admin.pages_dashboard');

    Route::get('bookmarks', 'BookmarksController@index')->name('admin.bookmarks_index');
    Route::get('bookmarks/add', 'BookmarksController@add')->name('admin.bookmarks_add');
    Route::get('bookmarks/edit/{id}', 'BookmarksController@edit')->name('admin.bookmarks_edit');
    Route::post('bookmarks/store', 'BookmarksController@store')->name('admin.bookmarks_store');
    Route::get('bookmarks/delete/{id}', 'BookmarksController@delete')->name('admin.bookmarks_delete');
    Route::get('bookmarks/goto/{id}', 'BookmarksController@goTo')->name('admin.bookmarks_goto');
    Route::get('tags', 'TagsController@index')->name('admin.tags_index');
    Route::get('tags/add', 'TagsController@add')->name('admin.tags_add');
    Route::get('tags/edit/{id}', 'TagsController@edit')->name('admin.tags_edit');
    Route::post('tags/store', 'TagsController@store')->name('admin.tags_store');
    Route::get('categories', 'CategoriesController@index')->name('admin.categories_index');
    Route::get('categories/add', 'CategoriesController@add')->name('admin.categories_add');
    Route::get('categories/edit/{id}', 'CategoriesController@edit')->name('admin.categories_edit');
    Route::get('categories/delete/{id}', 'CategoriesController@delete')->name('admin.categories_delete');
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
