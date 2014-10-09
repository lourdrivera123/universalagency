<?php namespace UniversalAgency\Repositories;

use Employer;
use Resume;
use Candidate;
use Job;
use Event;
use Auth;
use UniversalAgency\Repositories\CandidatesRepository;
use UniversalAgency\Repositories\ResumeRepository;
use UniversalAgency\Repositories\MessagesRepository;
use UniversalAgency\Repositories\NotificationRepository;
use UniversalAgency\Repositories\InvitationRepository;
// use UniversalAgency\InvitationList\InvitationList;
use Carbon\Carbon;
use Log;

class JobsRepository {

	protected $candidate;
	protected $resume; 
	protected $message;
	protected $notification;
	protected $invitation;

	function __construct(CandidatesRepository $candidate, ResumeRepository $resume,
		MessagesRepository $message, NotificationRepository $notification, 
		InvitationRepository $invitation )
	{
		$this->candidate = $candidate;
		$this->resume = $resume;
		$this->message = $message;
		$this->notification = $notification;
		$this->invitation = $invitation;

		Event::listen('applicant.invite','UniversalAgency\Mailers\ApplicantInvitationMailer@send');
	}

	function create($input)
	{
		$job = new Job;
		$job->job_category = $input['job_category'];
		$job->company = Employer::whereBusinessname($input['company'])->first()->id;
		$job->description = $input['description'];
		$job->job_title = $input['job_title'];
		$job->location = $input['job_location'];
		// $job->employmenttype = $input['employmenttype'];

		if ( $input['gender']  === 'male' )
			$job->gender = 'male';

		if ( $input['gender']  === 'female' )
			$job->gender = 'female';

		if ( $input['gender'] === 'both' )
			$job->gender = 'both';

		$job->agefrom = $input['agefrom'];
		$job->ageto = $input['ageto'];
		$job->education = $input['education'];

		if( isset($input['anyworkexperience']) && !is_null($input['anyworkexperience']) )
		{
			$job->minimumyearsofexperience = 0;
		}
		else
		{
			$job->minimumyearsofexperience = $input['minimumyearsofexperience'];
		}

		$job->others = $input['others'];
		$job->invitationexpiration = $input['invitationexpiration'];
		$job->save();

		$possiblecandidatesByPositions = $this->resume->findResumesByQualification($job);

		if ( !empty($possiblecandidatesByPositions))
		{

			foreach ( $possiblecandidatesByPositions as $possiblecandidate ) 
			{
				Log::info($possiblecandidate->id );

				$invitation = $this->invitation->create($possiblecandidate->user()->first()->id, $job->id, $job->job_category);

				$user = $possiblecandidate->user()->first();

				$subject = 'You have been invited for a job "'.$job->job_title.'".';

				$notification = $this->notification->createInvitationNotification($job ,Auth::user()->id, $user->id, $subject, $job->company);

				Event::fire('applicant.invite', [$user, $notification, $job]);

			}
		}

		return $job;
	}

	function update($input)
	{
		$job = Job::findOrFail($input['job_id']);
		$job->job_category = $input['job_category'];
		$job->company = Employer::whereBusinessname($input['company'])->first()->id;
		$job->description = $input['description'];
		$job->job_title = $input['job_title'];
		$job->location = $input['editjob_location'];
		$job->employmenttype = $input['employmenttype'];
		
		if ( $input['gender']  === 'male' )
			$job->gender = 'male';

		if ( $input['gender']  === 'female' )
			$job->gender = 'female';

		if ( $input['gender'] === 'both' ){
			$job->gender = 'both';
		}

		$job->agefrom = $input['agefrom'];
		$job->ageto = $input['ageto'];
		$job->education = $input['education'];

		if( isset($input['anyworkexperienceedit']) && !is_null($input['anyworkexperienceedit']) )
		{
			$job->minimumyearsofexperience = 0;
		}
		else
		{
			$job->minimumyearsofexperience = $input['minimumyearsofexperience'];
		}
		
		$job->others = $input['others'];
		$job->invitationexpiration = $input['invitationexpiration'];
		$job->save();

		return $job;
	}

	function disable($input)
	{
		$job = Job::findOrFail($input['id']);
		$job->delete();

		return $job;
	}

	function enable($input)
	{
		$job = Job::withTrashed()->findOrFail($input['id']);
		$job->restore();

		return $job;
	}

	function getJobByTitle($input)
	{
		$job = Job::whereJobTitle($input['job_title'])->first();

		return $job;
	}

	function searchForJobsWithExpiringInvitations()
	{
		// $jobs = Job::whereBetween('invitationexpiration', [ 0000-00-00, Carbon::now()->toDateString()])->get();
		$jobs = Job::where('invitationexpiration', '=', Carbon::now()->toDateString())->get();

		return $jobs;
	}

	function listjobs()
	{
		$jobs = Job::lists('job_title', 'id');

		return $jobs;
	}

	function getJobById($id)
	{
		$job = Job::findOrFail($id);

		return $job;
	}
}