<?php

use UniversalAgency\Repositories\EmployersRepository;
use UniversalAgency\Repositories\JobCategoriesRepository;
use UniversalAgency\Repositories\JobsRepository;
use UniversalAgency\Repositories\ResumeRepository;

class HomeController extends BaseController {

	protected $employer;
	protected $jobcategory;
	protected $job;
	protected $resume;

	function __construct(EmployersRepository $employer, Jobcategory $jobcategory 
		JobsRepository $job, ResumeRepository $resume)
	{
		$this->employer = $employer;
		$this->jobcategory = $jobcategory;
		$this->job = $job;
		$this->resume = $resume;
	}

	function mainhome()
	{
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

	function home()
	{
		$employers = $this->employer->get_random_employers_and_take_only(4);

		$categories = $this->jobcategory->get_all_categories();
		
		$jobs = $this->job->get_all_jobs();

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
		$employers = $this->employer->get_all_employers();

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
		$jobs = $this->job->get_all_jobs();

		$categories = $this->jobcategory->get_all_categories();

		return View::make('applicant.joblist')
		->withJobs($jobs)
		->withCategories($categories);
	}

	function getjoblist($id)
	{
		try{

			$jobs2 = $this->job->get_jobs_by_category_id($id);

			$categories = $this->jobcategory->get_all_categories();

			$categoryname = $this->jobcategory->get_category_name_by_id($id);

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

		$employer = $this->employer->get_employer_by_id($id);

		$employers = $this->employer->get_all_employers();
		
		$jobs3 = $this->job->get_jobs_by_employer_id($employer->id);

		return View::make('applicant.joblist')
		->withJobs3($jobs3)
		->withEmployers($employers)
		->withEmployer($employer);
	}

	function getapplicant($id)
	{
		$resume = $this->resume->get_resume_by_id($id);

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
