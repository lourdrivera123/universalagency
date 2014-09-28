<?php
use UniversalAgency\Repositories\ResumeRepository;
use UniversalAgency\Repositories\JobCategoriesRepository;
use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\ResumeForm;
use UniversalAgency\Repositories\IqTestRepository;

class ResumeController extends \BaseController {

	protected $resume;
	protected $resumeForm;
	protected $jobcategory;
	protected $iqtest;

	function __construct(ResumeRepository $resume, ResumeForm $resumeForm, 
		JobCategoriesRepository $jobcategory, IqTestRepository $iqtest)	
	{
		$this->resume = $resume;
		$this->resumeForm = $resumeForm;
		$this->jobcategory = $jobcategory;
		$this->iqtest = $iqtest;
	}

	function employerside()
	{
		$resumes = Resume::all();

		return View::make('employer.employerhome')
		->withResumes($resumes);
	}

	function adminviewapplicants()
	{
		$resumes = Resume::all();
		return View::make('admin.adminviewapplicants')
		->withResumes($resumes);
	}

	function profile()
	{
		$iqresult = "";
		$iqdescription = "";
		$personalityresult = "";

		$resume = Auth::user()->resume()->first();
		$attachments = Userattachment::all();
		$educations = $resume->education()->get();
		$jobs = $resume->jobhistory()->get();
		$resumepdf = $resume->resumepdf()->first();
		$attachments = Auth::user()->userattachment()->get();

		if(!is_null(getIQResult())) {
			$iqresult = getIQResult();
			$iqdescription = $this->iqtest->identifyIq($iqresult->result);
		}

		if(!is_null(getPersonalityResult())) {
			$personalityresult = getPersonalityResult();	
		}
		
		return View::make('applicant.profile')
		->withResume($resume)
		->withEducations($educations)
		->withAttachments($attachments)
		->withPersonalityresult($personalityresult)
		->withIqresult($iqresult)
		->withIqdescription($iqdescription)
		->withJobs($jobs)
		->withResumepdf($resumepdf)
		->withAttachments($attachments);
	}

	function create()
	{
		$user = authenticateduser();
		$resume = $user->resume()->first();
		$jobcategories = $this->jobcategory->listcategories();
		$jobhistories = $resume->jobhistory()->get();
		$educations = $resume->education()->get();
		
		return View::make('applicant.create-resume')
		->withResume($resume)
		->withJobcategories($jobcategories)
		->withJobhistories($jobhistories)
		->withEducations($educations);
	}

	function store()
	{	
		try
		{
			$this->resumeForm->validate(Input::all());
			
			$this->resume->create(Input::all());

			if ( checkIfUserHasTakenTests(Auth::user()->id) != 'all tests taken!' )
			{
				$testStatus = checkIfUserHasTakenTests(Auth::user()->id);

				if ( $testStatus == 'did not take personality test')
				{
					return Redirect::to('pleasetakepersonalitytest')
					->withPersonalitytestreminder('Please take Personality test');

				} else if ( $testStatus == 'did not take iq test' )
				{
					return Redirect::to('pleasetakeiqtest')
					->withIqtestreminder('Please take IQ test');
				}
			}

			return Redirect::to('profile');
		}
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

		
	}

	function disable()
	{
		$applicant = $this->resume->disable(Input::all());

		return Response::json(['id' => $applicant->id, 'applicantname' => $applicant->last_name.', '.$applicant->first_name ]);
	}

	function enable()
	{
		$applicant = $this->resume->enable(Input::all());

		return Response::json(['id' => $applicant->id, 'applicantname' => $applicant->last_name.', '.$applicant->first_name ]);	
	}
}