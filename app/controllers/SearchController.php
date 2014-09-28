<?php
use Illuminate\Support\Collection as Collection;
class SearchController extends \BaseController {

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
			$searchjobs = Job::where('job_title', 'LIKE', '%'.$keyword.'%')->get();

			return View::make('applicant.joblist')
			->withSearchjobs($searchjobs);

		} 
		else if( $searchby == 'company' )
		{
			$searchcompany = new Collection();
			$employers = Employer::where('businessname', 'LIKE', '%'.$keyword.'%')->get();

			foreach ($employers as $employer)
			{
				$jobsonemployer = Job::whereCompany($employer->id)->get();

				foreach ( $jobsonemployer as $jobonemployer )
				{
					$searchcompany->push($jobonemployer);
				}
			}

			return View::make('applicant.joblist')
			->withSearchcompany($searchcompany);


		} else if ( $searchby == 'location' )
		{
			$searchlocation = Job::where('location', 'LIKE', '%'.$keyword.'%')->get();

			return View::make('applicant.joblist')
			->withSearchlocation($searchlocation);
			// dd($jobs);
		}
	}
	
}