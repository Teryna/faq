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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::get('/question/unanswered', 'QuestionsController@unanswered')->name('admin.question.unanswered');
    Route::resource('/category', 'CategoriesController', ['as' => 'admin']);
    Route::resource('/question', 'QuestionsController', ['as' => 'admin']);
    Route::resource('/user', 'UsersController', ['as' => 'admin']);  
    Route::get('/category/{category}/questions', 'CategoriesController@questions')->name('admin.category.questions');
    Route::get('/question/{question}/hide', 'QuestionsController@hidden')->name('admin.question.hidden');
    Route::get('/question/{question}/answer', 'QuestionsController@answer')->name('admin.question.answer');   
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('faq', 'IndexController');
