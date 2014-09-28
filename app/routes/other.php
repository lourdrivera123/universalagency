<?php
/* Other Routes */

Route::get('resetDatabase', function(){
	return View::make('resetDatabase');
});

Route::get('resetDatabaseOnline', function(){
	return View::make('resetDatabaseOnline');
});

Route::when('*', 'csrf', ['post', 'put', 'patch']);