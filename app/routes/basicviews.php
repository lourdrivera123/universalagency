<?php
/*Basic Views */

Route::get('/', 'HomeController@home');

Route::get('home', 'HomeController@home');

Route::get('sample', 'HomeController@sample');

Route::get('features', 'HomeController@features');

Route::get('partners', 'HomeController@partners');

Route::get('termsofuse', 'HomeController@terms');

Route::get('faq', 'HomeController@faq');

Route::get('contact', 'HomeController@contact');

Route::get('question', 'HomeController@question');

Route::get('search', 'SearchController@search');

Route::get('logout', 'HomeController@logout');

Route::get('signout', 'SessionsController@destroy');

Route::get('signup', 'HomeController@signup');

Route::get('signin', 'HomeController@signin');

Route::get('joblist', 'HomeController@joblist');

Route::get('joblist/{id}', 'HomeController@getjoblist');

Route::get('joblist/employer/{id}', 'HomeController@employerjoblist');


App::missing(function($exception){
	return View::make('404');
});