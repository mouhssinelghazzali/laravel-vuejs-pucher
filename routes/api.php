<?php


Route::apiresource('/question','QuestionController');
Route::apiresource('/category','CategoryController');
Route::apiresource('/question/{question}/reply','ReplyController');

Route::post('/like/{reply}','LikeController@LikeIt');
Route::delete('/like/{reply}','LikeController@UnLikeIt');




