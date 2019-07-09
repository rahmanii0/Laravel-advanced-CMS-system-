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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){



    Route::get('/home', ['uses'=>'HomeController@index','as'=>'home']);


    Route::get('/category/index',[
        'uses'=>'CategoryController@index',
        'as'=>'category.index'
    ]);

    Route::get('/category/create',[
        'uses'=>'CategoryController@create',
        'as'=>'category.create'
    ]);

    Route::get('/category/edit/{id}',[
        'uses'=>'CategoryController@edit',
        'as'=>'category.edit'
    ]);
    Route::get('/category/delete/{id}',[
        'uses'=>'CategoryController@destroy',
        'as'=>'category.delete'
    ]);


    Route::post('/category/store',[
        'uses'=>'CategoryController@store',
        'as'=>'category.store'
    ]);

    Route::post('/category/update/{id}',[
        'uses'=>'CategoryController@update',
        'as'=>'category.update'
    ]);
    //POSTS ROUTES
    Route::get('/posts',[
        'uses'=>'PostController@index',
        'as'=>'posts'
    ]);

    Route::get('/post/create',[
        'uses'=>'PostController@create',
        'as'=>'post.create'
    ]);


    Route::post('/post/store',[
        'uses'=>'PostController@store',
        'as'=>'post.store'
    ]);


});