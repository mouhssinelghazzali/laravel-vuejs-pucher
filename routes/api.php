<?php


Route::apiresource('/question','QuestionController');


Route::get('question/category/{category}','CategoryController@category')->name('category');

Route::apiresource('/category','CategoryController');
Route::apiresource('/question/{question}/reply','ReplyController');

Route::post('/like/{reply}','LikeController@LikeIt');
Route::delete('/like/{reply}','LikeController@UnLikeIt');
Route::post('notifications', 'NotificationController@index');
Route::post('markAsRead', 'NotificationController@markAsRead');


//Authentification JWT
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('signup', 'AuthController@signup'); 
    Route::post('me', 'AuthController@me');

});








