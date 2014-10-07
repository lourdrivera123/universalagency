<?php
use Illuminate\Support\Collection as Collection;
use UniversalAgency\Repositories\JobsRepository;
use UniversalAgency\Repositories\EmployersRepository;

class SearchController extends \BaseController {

	protected $job;	
	protected $employer;

	function __construct(JobsRepository $job, EmployersRepository $employer)
	{
		$this->job = $job;
		$this->employer = $employer;
	}


	public function addItem($obj, $key = null) {
		if ($key == null) {
			$this->items[] = $obj;
		}
		else {
			if (isset($this->items[$key])) {
				throw new KeyHasUseException("Key $key already in use.");
			}
			else {
				$this->items[$key] = $obj;
			}
		}
	}

	function search()
	{
		$searchby = Input::get('searchby');
		$keyword = Input::get('keyword');

		if($searchby == 'job_title')
		{
			$searchjobs = $this->job->get_job_by_job_title($keyword);

			return View::make('applicant.joblist')
			->withSearchjobs($searchjobs);
		} 
		else if( $searchby == 'company' )
		{
			$searchcompany = new Collection();

			$employers = $this->employer->get_employers_by_businessname($keyword);

			foreach ($employers as $employer)
			{
				$jobsonemployer = $this->job->get_jobs_by_employer_id($employer->id);

				foreach ( $jobsonemployer as $jobonemployer )
				{
					$searchcompany->push($jobonemployer);
				}
			}

			return View::make('applicant.joblist')
			->withSearchcompany($searchcompany);


		} else if ( $searchby == 'location' )
		{
			$searchlocation = $this->job->get_job_by_location($keyword);	

			return View::make('applicant.joblist')
			->withSearchlocation($searchlocation);
		}
	}
	
}