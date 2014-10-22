<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use UniversalAgency\Repositories\ContractsRepository;

class ContractExpiration extends ScheduledCommand {

	protected $name = 'universalagency:contractexpiration';
	protected $description = 'Expiration of Contract Command';
	
	protected $contract;

	public function __construct(ContractsRepository $contract)
	{
		$this->contract = $contract;
		parent::__construct();
	}

	public function schedule(Schedulable $scheduler)
	{
		return $scheduler;
	}

	public function fire()
	{
		$expiringcontracts = $this->contract->search_for_expiring_contracts_and_delete();


		return $this->info('Expired contracts are now inactive');
	}

}
