<?php
foreach (File::allFiles(__DIR__.'/routes') as $partial )
{
	require_once $partial->getPathname();
}


Route::get('payroll_report/{id}', function($id){
	$payroll_report = Payrollsummary::findOrFail($id);

	$table = Excel::selectSheets('Sheet1')->load(public_path().'/'.$payroll_report->path, function($reader) {

	    $reader->noHeading()->skip(5)->take(1)->formatDates(false);
	
	})->get();

	return View::make('applicant.payroll_report')->withPayrollReport($payroll_report)->withTable($table);
});