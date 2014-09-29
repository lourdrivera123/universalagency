<?php

Route::get('employerside', 'ResumeController@employerside')->before('role:employer');

Route::get('employerchangepassword', 'EmployersController@employerchangepassword')->before('role:employer');

Route::get('employer/{id}', 'EmployersController@getemployer');

Route::get('employerdtrupload', 'EmployersController@employerdtrupload');

Route::post('employerdtrupload', 'DtrController@store');