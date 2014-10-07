<?php namespace UniversalAgency\Repositories;

use Auth;
use Image;
use Resume;
use UniversalAgency\Repositories\PdfgeneratorRepository;

class ResumeRepository {

	protected $pdfgenerator;

	function __construct(PdfgeneratorRepository $pdfgenerator)
	{
		$this->pdfgenerator = $pdfgenerator;
	}

	function create($input)
	{
		$resume = Auth::user()->resume()->first();
		$resume->user_id = Auth::user()->id;
		$resume->first_name = $input['first_name'];
		$resume->last_name = $input['last_name'];
		$resume->birth_date = $input['birth_date'];
		$resume->gender = $input['gender'];
		$resume->marital_status = $input['marital_status'];
		$resume->phone_number = $input['phone_number'];
		$resume->address = $input['address'];
		$resume->overview = $input['overview'];
		$resume->position_desired = $input['position_desired'];
		$resume->titleofexpertise = $input['titleofexpertise'];
		$resume->status = "Available";

		if( !is_null($input['photo']) )
		{
			$image = $input['photo'];
			$imagename = md5(date('YmdHis')).'.jpg';

			if ($image->getMimeType() == 'image/png'
				|| $image->getMimeType() == 'image/jpg'
				|| $image->getMimeType() == 'image/gif'
				|| $image->getMimeType() == 'image/jpeg'
				|| $image->getMimeType() == 'image/pjpeg')
			{
				$path = public_path('images/applicant_pictures/' . $imagename);
				Image::make($image->getRealPath())->save($path);
				$resume->photo  =   '/images/applicant_pictures/'.$imagename;
			}
		}

		$resume->save();

		$this->pdfgenerator->generate($resume);
	}

	function disable($input)
	{
		$applicant = Resume::findOrFail($input['id']);
		$applicant->user()->first()->delete();

		return $applicant;
	}

	function enable($input)
	{
		$applicant = Resume::findOrFail($input['id']);
		$applicant->user()->withTrashed()->first()->restore();

		return $applicant;
	}

	function findResumesByQualification($job )
	{

		if ($job->gender != 'both')
		{


			$possiblecandidatesByPositions = Resume::wherePositionDesired($job->job_category)
			->whereGender($job->gender)
			->get();

		}else {
			
			$possiblecandidatesByPositions = Resume::wherePositionDesired($job->job_category)
			->get();	

		}

		if ( $job->minimumyearsofexperience != 0 )
		{
			foreach ( $possiblecandidatesByPositions as $possiblecandidatesByPosition )
			{
				$workexp = getmaximumworkexp($possiblecandidatesByPosition);

				if ( (! $workexp >= $job->minimumyearsofexperience ) )
				{
					unset($possiblecandidatesByPosition);
				}
			}

		}

		foreach ( $possiblecandidatesByPositions as $possiblecandidatesByPosition )
		{
			// $workexp = getmaximumworkexp($possiblecandidatesByPosition);
			$age = calculateAge($possiblecandidatesByPosition->birth_date);

			if ( (! $age >= $job->agefrom ) && (! $age <= $job->ageto) )
			{
				unset($possiblecandidatesByPosition);
			}
		}

		$highesteducation = 0;
		
		foreach ($possiblecandidatesByPositions as $possiblecandidatesByPosition)
		{
			foreach ($possiblecandidatesByPosition->education()->get() as $possibelcandidateeducation)
			{
				if ( $possibelcandidateeducation->degree_level > $highesteducation )
				{
					$highesteducation = $possibelcandidateeducation->degree_level;
				}
			}

			if ( $highesteducation < $job->education )
			{
				unset($possiblecandidatesByPosition);
			}
		}

		return $possiblecandidatesByPositions;
	}

	function getEmployees()
	{
		$resumes = Resume::all();
		// $resumes = $resume->lists('full_name', 'id');

		return $resumes;
	}

	function get_resume_by_id($id)
	{
		$resume = Resume::findOrFail($id);

		return $resume;
	}

	function get_all_resumes()
	{
		$resumes = Resume::all();

		return $resumes;
	}
}