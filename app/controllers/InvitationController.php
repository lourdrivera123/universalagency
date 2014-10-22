<?php

use UniversalAgency\Repositories\InvitationRepository;
use UniversalAgency\Repositories\CandidatesRepository;
use UniversalAgency\Repositories\NotificationRepository;

class InvitationController extends \BaseController {

	protected $invitation;
	protected $candidate;
	protected $notification;

	function __construct(InvitationRepository $invitation, CandidatesRepository $candidate,
	 NotificationRepository $notification)
	{
		$this->invitation = $invitation;
		$this->candidate = $candidate;
		$this->notification = $notification;
	
		Event::listen('applicant.invite','UniversalAgency\Mailers\ApplicantInvitationMailer@send');
	}

	function acceptinvitation()
	{
		$invitation = $this->invitation->acceptinvitation(Input::all());

		$userid = $invitation->user()->first()->id;

		$jobid = $invitation->job_id;

		if ( checkIfUserHasTakenTests(Auth::user()->id) != 'all tests taken!' )
		{
			$testStatus = checkIfUserHasTakenTests(Auth::user()->id);

			if ( $testStatus == 'did not take personality test')
			{
				$invitation->hastakenpersonalitytest = 1;
			}

			if ( $testStatus == 'did not take iq test' )
			{
				$invitation->hastakeniqtest = 1;
			}
		}

		return $invitation;
	}

	function declineinvitation()
	{
		$invitation = $this->invitation->declineinvitation(Input::all());

		return $invitation;
	}

	function admininviteapplicants()
	{
		$userid = Input::get('invitedapplicant');

		$user = User::findOrFail($userid);

		$job = Job::findOrFail(Input::get('invite_applicant_jobid'));

		$invitation = $this->invitation->create($userid, $job->id, $job->job_category);

		$subject = 'You have been invited for a job "'.$job->job_title.'".';

		$notification = $this->notification->createInvitationNotification($job , Auth::user()->id, $user->id, $subject, $job->company);

		Event::fire('applicant.invite', [$user, $notification, $job]);
	}

}