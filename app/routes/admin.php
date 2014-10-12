<?php

/* Admin Routes */

// Route::get();

Route::get('/admindeleteemployeecontract/{id}', 'ContractsController@admindeleteemployeecontract');

Route::get('adminapplicantevaluation/{id}', 'EvaluationController@adminapplicantevaluation')->before('role:admin');

Route::get('adminemployercontracts', 'ContractsController@adminemployercontracts')->before('role:admin');

Route::get('adminscheduledinterviews', 'InterviewController@adminscheduledinterviews')->before('role:admin');

Route::get('adminjobinvitations', 'CandidateController@adminjobinvitations')->before('role:admin');

// Route::get('adminsetemployercontract', 'ContractsController@adminsetemployercontract');

Route::get('adminviewreports', 'ReportsController@viewrevenue')->before('role:admin');

Route::get('checkmail', 'UsersController@checkmail');

Route::get('/adminopened', 'InboxController@adminopened');

Route::get('adminjobrequests', 'PendingjobrequestController@adminjobrequests')->before('role:admin');

Route::get('adminviewtests', 'TestsController@adminviewtests')->before('role:admin');

Route::get('/adminInboxList', 'InboxController@admininboxlist')->before('role:admin');

Route::get('adminviewapplicants', 'ResumeController@adminviewapplicants')->before('role:admin');

Route::get('adminviewstaff', 'StaffController@staff')->before('role:admin');

Route::get('adminaddjobposition', 'JobCategoriesController@adminaddjobposition')->before('role:admin');

Route::get('adminjobcategories', 'JobCategoriesController@adminjobcategories')->before('role:admin');

Route::get('adminemployers', 'EmployersController@adminemployers')->before('role:admin');

Route::get('adminlogin', 'HomeController@adminlogin');

Route::get('admininbox', 'InboxController@admininbox')->before('role:admin');

Route::get('admincompose', 'InboxController@admincompose')->before('role:admin');

Route::get('adminreply', 'InboxController@adminreply');

Route::get('adminjobs', 'JobsController@adminjobs')->before('role:admin');

Route::get('adminlogout', 'UsersController@adminlogout');

Route::get('adminjobcandidates/{id}', 'CandidateController@adminjobcandidates');

Route::get('adminjobhires/{id}', 'CandidateController@adminjobhires');

Route::post('admin', 'SessionsController@adminstore');

Route::get('/adminpoplulaterenewcontract', 'ContractsController@adminpoplulaterenewcontract'); 

//ajax actions

Route::post('/adminsaveemployercontractrenew', 'ContractsController@adminsaveemployercontractrenew');

Route::post('/admininviteapplicants', 'InvitationController@admininviteapplicants');

Route::post('/admindeclineApplicantUnderReview', 'CandidateController@admindeclineApplicantUnderReview');

Route::get('/adminFetchInterviewEvents', 'InterviewController@adminFetchInterviewEvents');

Route::post('/adminaddevent', 'InterviewController@adminaddevent');

Route::get('/admingetcompanyname', 'JobsController@getcompanyname');

Route::post('/adminsaveemployercontract', 'ContractsController@generateEmployerContract');

Route::post('/adminsaveemployeecontract', 'ContractsController@generateEmployeeContract');

Route::post('/sendMessageFromAdmin', 'MessagesController@sendMessageFromAdmin');

Route::get('/checkJobTitle', 'JobsController@checkJobTitle');

Route::get('/checkBusinessName', 'EmployersController@checkBusinessName');

Route::get('/checkUniqueEmail', 'UsersController@checkUniqueEmail');

Route::get('/checkEmployerPhoneNumber', 'EmployersController@checkEmployerPhoneNumber');

Route::get('/checkStaffPhoneNumber','StaffController@checkStaffPhoneNumber');

Route::post('/checkJobTitleforUpdate', 'JobsController@checkJobTitleforUpdate');

Route::get('/checkUniqueJobcategory', 'JobCategoriesController@checkUniqueJobcategory');

Route::get('/adminlistcandidates', 'CandidateController@listcandidates');

Route::get('/listrequestingapplicants', 'PendingjobrequestController@listrequestingapplicants');

Route::post('/adminaddstaff', 'StaffController@store');

Route::post('/adminapproverequest', 'PendingjobrequestController@approverequest');

Route::post('/admindisapproverequest', 'PendingjobrequestController@disapproverequest');

Route::post('/adminrequestapproval', 'PendingjobrequestController@adminrequestapproval');

Route::post('/adminaddjobcategory', 'JobCategoriesController@store');

Route::post('/adminupdatecategory', 'JobCategoriesController@update');

Route::post('/admindisablejobcategory', 'JobCategoriesController@disablejobcategory');

Route::post('/adminenablejobcategory', 'JobCategoriesController@enablejobcategory');

Route::post('/adminaddemployer', 'EmployersController@store');

Route::post('/adminupdateemployer', 'EmployersController@update');

Route::post('/admindisableemployer', 'EmployersController@disable');

Route::post('/adminenableemployer', 'EmployersController@enable');

Route::post('/admindisableapplicant', 'ResumeController@disable');

Route::post('/adminenableapplicant', 'ResumeController@enable');

Route::post('/adminaddjob', 'JobsController@store');

Route::post('/adminupdatejob', 'JobsController@update');

Route::post('/admindisablejob', 'JobsController@disable');

Route::post('/adminenablejob', 'JobsController@enable');