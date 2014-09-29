<?php
foreach (File::allFiles(__DIR__.'/routes') as $partial )
{
	require_once $partial->getPathname();
}

// Route::get('here', function(){
// 	use SimpleExcel\SimpleExcel;

// $excel = new SimpleExcel('CSV');
// $excel->parser->loadFile('test.csv');

// echo $excel->parser->getCell(1, 1);

// $excel->convertTo('JSON');
// $excel->writer->addRow(array('add', 'another', 'row'));
// $excel->writer->saveFile('example');
// });

Route::get('yuwa', function(){
	return View::make('admin.applicantevaluation');
});

Route::get('thankyoufor', function(){
	return View::make('applicant.thankyoufortheinterview');
});

Route::get('datetime', function(){
	return Carbon\Carbon::now()->toDayDateTimeString();
});

Route::get('trialdisplay', function(){
	return View::make('trialdisplay');
});

Route::get('nplus1', function(){
	$candidates = Candidate::whereJobId(6)->with('user')->get();
	return $candidates; 

	echo '<pre>';
	echo var_dump($candidates);
	echo '</pre>';

});

Route::get('fetchinterviewstoday', function(){

	$interviews  = Interview::whereBetween('event_date_time', [ Carbon\Carbon::now()->toDateString().' 00:00:00', Carbon\Carbon::now()->toDateString().' 23:59:59'])->get();

	return $interviews;
});

Route::get('determinethejob', function(){
	$jobs = Job::where('invitationexpiration', '<=',  Carbon\Carbon::now()->toDateString())->get();
	// $jobs = Job::where("Date('event_date_time')", '=', '2014-09-27')->get();
	return $jobs;
});

Route::get('xsl', function(){
	
	// Excel::load(public_path().'/sampleDTR2.xslx', function($reader) {

 //    // reader methods
	// 	dd($reader->first());
	// });

	// echo '<pre>';
	// echo Excel::load(public_path().'/xls/dtr_form.xls')->get();
	// echo '</pre>';
	return Excel::load(public_path().'/xls/dtr_form.xls', 'UTF-8')->convert('pdf')->get();

});

Route::get('fuckingdate', function(){
	$interview = Interview::first();

	$instance = new \Carbon\Carbon($interview->event_date_time);

	// $carbonated = Carbon\Carbon::now()->format('D M d Y H:i:s O');

	// $instance = Carbon\Carbon::createFromFormat('Y-m-d', $interview->event_date_time);
	// $date =	$interview->event_date_time->date('D M d Y H:i:s O');
	return $instance->format('D M d Y H:i:s +0800');
});

Route::get('seethereturn', function(){
	$interviews = Interview::all();
	$collections = new Illuminate\Support\Collection;

	foreach( $interviews as $interview )
	{
		foreach ( $collections as $collection )
		{
			$collection->title = $interview->event_title;
			$collection->start = $interview->event_date_time;
			$collection->description = '["event", "bg-color-greenLight"]';	
		}
	}

	return $collections;
});


Route::get('trial', function(){
	return Contract::whereJob('sample')->first()->salary;
});

Route::get('contract', function(){
	return View::make('admin.adminemployercontract');
});

Route::get('dtr', function(){
	return View::make('dtr');
});

Route::get('tokbox', function(){
	return View::make('tokbox');
});

// Route::get('sample', function(){
	// return '<iframe id="videoEmbed" src="http://teamlaravel.com/tokbox" width="350" height="265" style="border:none" frameborder="0"></iframe>';
// });

Route::get('messagefromadmin', function(){
	
	echo '<pre>';
	echo Message::all();
	echo '</pre>';
});

Route::get('pdf', function(){
	$resume = Resume::first();
	$educations = $resume->education()->get();
	$jobhistories = $resume->jobhistory()->get();

	return View::make('applicant.trialpdfpage')->withResume($resume)->withEducations($educations)->withJobhistories($jobhistories);
});

Route::get('tr2', function(){
	$resume = Resume::find(1);
	// return $resume->toArray();
	// $jobCategory = Jobcategory::find(2);
	// return $jobCategory->category;
	return $resume->jobcategory()->first()->category;
});

Route::get('mirang', function(){
	$firstname = 'zemskie';
	$token = 'shit';
	return View::make('emails.user_activation_mailer')
	->withFirstname($firstname)
	->withToken($token);
});

Route::get('shit', function(){

	function generateRandomString($length = 6) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	return md5(date('YmdHis').generateRandomString());
});

Route::get('shit', function(){
	$candidate = Candidate::whereJobId(18)->get();

	echo '<pre>';
	dd($candidate->toArray());
	echo '</pre>';
});

Route::get('educationshit', function(){
	return Education::find(1)->levelname;
});