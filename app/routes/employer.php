<?php

Route::get('employerside', 'ResumeController@employerside')->before('role:employer');

Route::get('employerchangepassword', 'EmployersController@employerchangepassword')->before('role:employer');

Route::get('employer/{id}', 'EmployersController@getemployer');