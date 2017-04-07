<?php


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('community', 'CommunityLinkController@index');
Route::post('community', 'CommunityLinkController@store');
Route::get('community/{channel}', 'CommunityLinkController@index');
Route::post('votes/{link}', 'VotesController@store');


