<?php

Route::get('employerside', 'ResumeController@employerside')->before('role:employer');

Route::get('employerchangepassword', 'EmployersController@employerchangepassword')->before('role:employer');

Route::get('employer/{id}', 'EmployersController@getemployer');

Route::get('employerdtrupload', 'EmployersController@employerdtrupload');

Route::get('employershowreports', 'EmployersController@showreports');

Route::get('employer_payroll_summary_upload', 'EmployersController@employer_payroll_summary_upload');

Route::post('employer_payroll_summary_upload', 'PayrollsummaryController@store');

Route::post('employerdtrupload', 'DtrController@store');

/*Route::get('employersalaryupload', );*/