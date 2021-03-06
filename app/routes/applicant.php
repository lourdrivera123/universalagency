<?php

/* Applicant Routes */ 

Route::get('excelent', function(){


	$table = Excel::selectSheets('Sheet2')->load(public_path().'/dtruploads/dtr_form.xls', function($reader) {

	    $reader->noHeading()->skip(11)->take(32)->formatDates(false);
	
	})->get();

	
	return View::make('excel')->withTable($table);

	
});

Route::get('pleasetakepersonalitytest', function(){
	return View::make('applicant.pleasetakepersonalitytest');
});

Route::get('pleasetakeiqtest', function(){
	return View::make('applicant.pleasetakeiqtest');
});

Route::get('payroll_reports', function(){

	$payroll_reports = Payrollsummary::whereEmployeeid(Auth::user()->id)->get();

	return View::make('applicant.payroll_reports')->withPayrollReports($payroll_reports);
});

Route::get('/notifystaffaboutid', 'NotificationController@notifystaffaboutid');

Route::get('thankyoufortheinterview', 'InterviewController@thankyoufortheinterview')->before('role:applicant');

Route::get('applicantinterviewee', 'InterviewController@applicantinterviewee')->before('role:applicant');

Route::get('personalityresult/{hash}', 'PersonalityTestController@personalityresult');

Route::get('messages', 'MessagesController@messages')->before('role:applicant');

Route::get('messages/{id}', 'MessagesController@viewmessage')->before('role:applicant');

Route::get('notifications', 'NotificationController@notifications')->before('auth');

Route::get('notification/{id}', 'NotificationController@viewnotification')->before('auth');

Route::get('iqtestresult/{hash}', 'IqTestController@iqtestresult');

Route::get('iqtest', 'IqTestController@iqtest')->before('role:applicant');

Route::get('personalitytest', 'PersonalityTestController@personalitytest')->before('role:applicant');

Route::get('changepassword', 'UsersController@changepassword')->before('role:applicant');

Route::get('create_resume', 'ResumeController@create')->before('role:applicant');

Route::get('profile', 'ResumeController@profile')->before('role:applicant');

Route::get('signin/activate/{token}', 'UsersController@activate');

Route::get('job/{id}', 'JobsController@getjob');

Route::get('applicant/{id}', 'HomeController@getapplicant');

Route::controller('password', 'RemindersController');

Route::post('iqtest', 'IqTestController@store')->before('role:applicant');

Route::post('signup', 'UsersController@store');

Route::post('signin', 'SessionsController@store');

Route::post('upload_require', 'UploadRequirementController@store');

Route::post('changepassword', 'UsersController@updatePassword');

Route::post('create_resume', 'ResumeController@store')->before('role:applicant');

Route::post('create_comment', 'CommentController@store');

Route::post('ask_question', 'FaqController@store');

//ajax actions

Route::post('/adduserattachment', 'UserAttachmentController@adduserattachment');

Route::get('/checkiftakentests', 'HomeController@checkiftakentests');

Route::post('/replymessage', 'MessagesController@replymessage');

Route::post('/acceptinvitation', 'InvitationController@acceptinvitation');

Route::post('/declineinvitation', 'InvitationController@declineinvitation');

Route::post('/submitPersonalityTest', 'PersonalityTestController@store');

Route::post('/addJobHistory', 'JobhistoryController@addJobHistory');

Route::post('/deleteJobhistory', 'JobhistoryController@deleteJobhistory');

Route::post('/addEducation', 'EducationController@addEducation');

Route::post('/deleteEducation', 'EducationController@deleteEducation');

Route::post('/apply', 'PendingjobrequestController@apply');

Route::post('/cancelapply', 'PendingjobrequestController@cancelapply');