<?php
/* Other Routes */

Route::get('resetDatabase', function(){
	return View::make('resetDatabase');
});

Route::get('resetDatabaseOnline', function(){
	return View::make('resetDatabaseOnline');
});

Route::get('/changemessagestatus', 'MessagesController@changemessagestatus');

Route::when('*', 'csrf', ['post', 'put', 'patch']);