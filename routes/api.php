<?php


Route::apiresource('/question','QuestionController');
Route::apiresource('/category','CategoryController');
Route::apiresource('/{question}/reply','ReplyController');




