<?php

class HomeController extends BaseController {

	function mainhome()
	{
		if(Request::root() == "http://admin.teamlaravel.com")
			return View::make('admin.loggedinadmin');

		return View::make('countdown');
	}

	function terms() 
	{
		return View::make('termsofuse');
	}

	function adminlogin()
	{
		if(isApplicant() || isEmployer())
			return View::make('pleasesignoutregularuser');

		return View::make('admin.adminlogin');
	}

	function sample() {
		$sss = Sss::all();
		$incometax = Incometax::all();
		$phic = Phic::all();

		return View::make('sample')
		->withSss($sss)
		->withIncometax($incometax)
		->withPhic($phic);
	}

	function home()
	{
		$employers = Employer::orderBy(DB::raw('RAND()'))->take(4)->get();
		$categories = Jobcategory::all();
		$jobs = Job::all();

		return View::make('home')
		->withEmployers($employers)
		->withCategories($categories)
		->withJobs($jobs);
	}

	function features(){
		return View::make('features');
	}

	function partners()
	{
		$employers = Employer::all();

		return View::make('partners')
		->withEmployers($employers);
	}

	function faq()
	{
		return View::make('faq');
	}

	function contact()
	{
		return View::make('contact');
	}

	function question()
	{
		return View::make('question');
	}

	function logout()
	{
		Auth::logout();

		return Redirect::to('signin');
	}

	function signup()
	{
		if(Auth::guest())
			return View::make('applicant.signup');

		return Redirect::to('joblist');
	}

	function signin()
	{
		if(Auth::guest())
			return View::make('applicant.signin');

		if(isAdmin())
			return View::make('YouAreAdmin');

		return Redirect::to('joblist');
	}

	function joblist()
	{
		$jobs = Job::all();
		$categories = Jobcategory::all();

		return View::make('applicant.joblist')
		->withJobs($jobs)
		->withCategories($categories);
	}

	function getjoblist($id)
	{
		try{
			$jobs2 = Job::whereJobCategory($id)->get();
			$categories = Jobcategory::all();
			$categoryname = Jobcategory::findOrFail($id)->category; 

			return View::make('applicant.joblist')
			->withJobs2($jobs2)
			->withCategories($categories)
			->withJobcategory($categoryname);
		} catch (Exception $e)
		{
			return View::make('404');
		}
	}

	function employerjoblist($id) {

		$employer = Employer::findOrFail($id);
		$employers = Employer::all();
		$jobs3 = Job::whereCompany($employer->id)->get();

		return View::make('applicant.joblist')
		->withJobs3($jobs3)
		->withEmployers($employers)
		->withEmployer($employer);
	}

	function getapplicant($id)
	{
		$resume = Resume::findOrFail($id);
		$educations = $resume->education()->get();
		$jobs = $resume->jobhistory()->get();
		$resumepdf = $resume->resumepdf()->first();
		$attachments = $resume->user()->first()->userattachment()->get();


		return View::make('applicant.profile')
		->withResume($resume)
		->withEducations($educations)
		->withJobs($jobs)
		->withAttachments($attachments)
		->withResumepdf($resumepdf);
	}

	function checkiftakentests()
	{
		return checkIfUserHasTakenTests(Auth::user()->id);
	}
}
