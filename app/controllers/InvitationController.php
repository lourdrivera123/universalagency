<?php

use UniversalAgency\Repositories\InvitationRepository;
use UniversalAgency\Repositories\CandidatesRepository;

class InvitationController extends \BaseController {

	protected $invitation;
	protected $candidate;

	function __construct(InvitationRepository $invitation, CandidatesRepository $candidate)
	{
		$this->invitation = $invitation;
		$this->candidate = $candidate;
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



}