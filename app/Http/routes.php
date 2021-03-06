<?php

// Home Page
Route::get('/', 'AuthController@home');

// Login and Logout
Route::get('/login', ['middleware' => 'guest', 'uses' => 'AuthController@getLogin']);
Route::post('/login', ['middleware' => 'guest', 'uses' => 'AuthController@postLogin']);
Route::get('/logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);

// Registration and User Profile
// NB: added create to exept array to remove registration
Route::resource('user', 'UserController', ['except' => ['index', 'show', 'destroy']]);


Route::get('/task/complete', 'TaskController@complete');
Route::get('/task/pending', 'TaskController@pending');
Route::post('/task/{task}/subtask', 'subtaskController@store');
Route::get('/task/{task}/subtask/create', 'subtaskController@create');
Route::resource('task', 'TaskController', ['middleware' => 'auth']);
Route::resource('subtask', 'subtaskController', ['middleware' => 'auth']);