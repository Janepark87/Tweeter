<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/tweets','TweetController');

// confirm delete the tweet!
Route::get('/tweets/{tweet}/delete', 'TweetController@delete');

// like
Route::post('/tweets/{tweet}/like', 'TweetController@like');

// Comments !!
Route::get('/tweets/{tweet}/comments/{comment}/edit', 'CommentController@edit');
Route::put('/tweets/{tweet}/comments/{comment}', 'CommentController@update')->name('comment.update');
Route::get('/tweets/{tweet}/comments/{comment}/delete', 'CommentController@delete');
Route::delete('/tweets/{tweet}/comments/{comment}', 'CommentController@destroy')->name('comment.delete');
Route::post('/tweets/{tweet}/comment', 'CommentController@addTweetComment')->name('tweetcomment.store');

// reply to comment
// Route::post('/reply/create/{comment}', 'CommentController@addReplyComment')->name('replycomment.store');

//Register !!
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

//Log-in !!
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

//Log-out !!
Route::get('/logout', 'SessionsController@destroy');
Route::post('/logout', 'SessionsController@destroy');

// Profile - user(avarta)
Route::get('/profile/{profile}', 'UserProfileController@show')->name('profiles.show');
Route::get('/profile/{profile}/update', 'UserProfileController@edit');
Route::post('/profile/{profile}/update', 'UserProfileController@update');
Route::get('/profile/{profile}/delete', 'UserProfileController@delete');
Route::delete('/profile/{profile}', 'UserProfileController@destroy');

// following
Route::get('/follow/{follow}','UserProfileController@follow');
Route::get('/unfollow/{unfollow}','UserProfileController@unfollow');

// the only following user list that i follow
Route::get('/following/{following}','UserProfileController@followingUser');
