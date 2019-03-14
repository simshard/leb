<?php

/**
 * Web Routes
 *
 * Here is where you can register web routes for your application.
 * These routes are loaded by the RouteServiceProvider
 *  within a group which contains the "web" middleware group.
 */

Route::get('/', 'ProjectController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');//user Dashboard

Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/{project}', 'ProjectController@show');

Route::get('/projects/{project}/edit', 'ProjectController@edit');
Route::patch('/projects/{project}', 'ProjectController@update')->name('projects.update');
Route::delete('/projects/{project}/delete', 'ProjectController@destroy')->name('projects.delete');

Route::get('/projects/{project}/uploadfile', 'ProjectController@uploadFile')->name('projects.uploadFile');
Route::post('/projects/{project}/uploadfile', 'ProjectController@uploadFilePost')->name('projects.uploadFilePost');
