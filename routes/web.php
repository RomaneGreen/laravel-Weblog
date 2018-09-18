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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create',
     ]
     );
    Route::get('/home', 'HomeController@index')->name('home');

    Route::Post('/post/store', [
         'uses' => 'PostsController@store',
         'as' => 'post.store',
      ]
      );
    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' => 'posts',
     ]
     );
    Route::get('/category/create', [
         'uses' => 'CategoriesController@create',
         'as' => 'category.create',
      ]
      );
    Route::post('/category/store', [
         'uses' => 'CategoriesController@store',
         'as' => 'category.store',
      ]
      );
    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories',
     ]
     );
    Route::get('/category/edit/{id}', [
      'uses' => 'CategoriesController@edit',
      'as' => 'category.edit',
   ]
   );
    Route::get('/category/delete/{id}', [
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.delete',
 ]
 );
    Route::post('/category/update/{id}', [
  'uses' => 'CategoriesController@update',
  'as' => 'category.update',
]
);
});
