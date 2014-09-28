<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use UniversalAgency\Repositories\CandidatesRepository;
use UniversalAgency\Repositories\InvitationRepository;
use UniversalAgency\Repositories\JobsRepository;

class InvitationExpiration extends ScheduledCommand {

	protected $name = 'universalagency:invitationexpiration';
	protected $description = 'Invitation Expiration Command';
	protected $candidate;
	protected $job;
	protected $invitation;

	public function __construct(CandidatesRepository $candidate, JobsRepository $job, InvitationRepository $invitation)
	{
		$this->candidate = $candidate;
		
		$this->job = $job;

		$this->invitation = $invitation;

		parent::__construct();
	}

	public function schedule(Schedulable $scheduler)
	{
		return $scheduler;
	}

	public function fire()
	{
		
		$expiringjobinvitations = $this->job->searchForJobsWithExpiringInvitations();

		foreach ( $expiringjobinvitations as $expiringjobinvitation )
		{
			// $this->candidate->deleteUninterestedCandidatesUsingJobID($expiringjobinvitation->id);
			$this->invitation->deleteInvitationsUsingJobId($expiringjobinvitation->id);
		}

		return $this->info('Pending Applicant Invitations Are Now Removed');
	}

}
