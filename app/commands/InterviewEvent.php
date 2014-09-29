<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use UniversalAgency\Repositories\InterviewRepository;

class InterviewEvent extends ScheduledCommand {

	protected $name = 'universalagency:interviewevent';
	protected $description = 'Interview Date Comes Command';
	
	protected $interview;

	public function __construct(InterviewRepository $interview)
	{
		$this->interview =  $interview;

		parent::__construct();
	}

	public function schedule(Schedulable $scheduler)
	{
		return $scheduler;
	}

	public function fire()
	{
		
		$interviewstoday = $this->interview->searchForInterviewsToday();

		foreach ( $interviewstoday as $interviewtoday )
		{
			// $this->candidate->deleteUninterestedCandidatesUsingJobID($expiringjobinvitation->id);
			$this->interview->notifyInterviewerandIntervieweeToday($interviewtoday->id);
		}

		return $this->info('Interviews Today Are Triggered');
	}

}