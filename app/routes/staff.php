<?php

Route::get('staffhome', 'StaffController@home')->before('role:staff');

Route::get('staffchangepassword', 'StaffController@staffchangepassword')->before('role:staff');

Route::get('staffinterviewer', 'InterviewController@staffinterviewer')->before('role:staff');

Route::get('evaluateApplicant', 'EvaluationController@evaluateApplicant')->before('role:staff');

Route::post('evaluateApplicant', 'EvaluationController@store')->before('role:staff');