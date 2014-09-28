<?php namespace UniversalAgency\Repositories;

use View;
use App;
use UniversalAgency\Repositories\ResumepdfRepository;
use Carbon\Carbon;
use Employer;
use User;

class PdfgeneratorRepository {

	protected $resumepdf;

	function __construct(ResumepdfRepository $resumepdf)
	{
		$this->resumepdf = $resumepdf;
	}

	function generate($resume)
	{
		$this->resumepdf->remove($resume->id);

		$educations = $resume->education()->get();
		$jobhistories = $resume->jobhistory()->get();
		$filepath = '/generatedpdf/'.$resume->last_name.', '.$resume->first_name.'.pdf';

		$pdf = App::make('dompdf');
		$pdf->loadHTML(View::make('applicant.trialpdfpage')->withResume($resume)->withEducations($educations)->withJobhistories($jobhistories))->save(public_path().$filepath)->stream();
		
		$this->resumepdf->create($filepath);

		return $pdf;
	}

	function generateEmployerContract($input)
	{
		$user = User::findOrFail($input['employer']);
		$clientname = $user->employer()->first()->businessname;
		$filepath = '/contracts/'.$input['job'].'.pdf';
		$datenow = Carbon::now()->toFormattedDateString();

		$pdf = App::make('dompdf');
		$pdf->loadHTML(View::make('admin.adminemployercontract')->withClientname($clientname)->withDate($datenow))->save(public_path().$filepath)->stream();
		
		// $this->resumepdf->create($filepath);

		return $filepath;
	}


}