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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('qustions', 'QustionController')->except('show');

//Route::post('/qustions/{qustion}/answers', 'AnswersController@store')->name('answers.store');

Route::resource('qustions.answers', 'AnswerController')->except(['index', 'create', 'show']); //bisa except bisa only tergantung pakai yg mana sesuaikan controller function yang dibutuhkan

Route::get('qustions/{slugs}', 'QustionController@show')->name('qustions.show');

Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept'); //Buat controller terlebih dahulu, baru membuat route untuk invoke
