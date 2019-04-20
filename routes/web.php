<?php
use Illuminate\Support\Facades\Route;

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
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Survey routes here

// Route::group(['namespace' => 'Admin', 'prefix' => 'survey', 'middleware' => 'auth'], function(){

//     Route::get('/', 'SurveyController@index')->name('survey.index');
//     Route::post('store', 'SurveyController@store')->name('survey.store');
//     Route::get('edit/{id}', 'SurveyController@edit')->name('survey.edit');
//     Route::PUT('update/{id}', 'SurveyController@update')->name('survey.update');
//     Route::DELETE('destroy/{id}', 'SurveyController@destroy')->name('survey.destroy');


// });

Route::resource('survey', 'Admin\SurveyController');


//category Routes

Route::resource('category', 'Admin\CategoryController');
// Route::put('category/{id}', 'Admin\CategoryController@update')->name('category.update');

Route::resource('question', 'Admin\QuestionController');
// Route::get('question/edit/{id}','Admin\QuestionController@edits')->name('question.edit');

Route::resource('answer', 'Admin\AnswerController');
Route::post('/answerstore', 'Admin\AnswerController@store');
