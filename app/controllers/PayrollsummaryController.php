<?php

use UniversalAgency\Repositories\NotificationRepository;

class PayrollsummaryController extends \BaseController {

	protected $notification;

	function __construct(NotificationRepository $notification )
	{
		$this->notification = $notification;
	}

	function store()
	{
		$payroll_summary = new Payrollsummary;
		$payroll_summary->employeeid = Input::get('employeeid');
		$payroll_summary->month = Input::get('month');
		
		if(Input::hasFile('file'))
		{
			$file = Input::file('file');
			
			if ($file->getMimeType() == 'application/vnd.ms-excel' )
			{
				$filename = md5(date('YmdHis')).'.xls';
                $path = public_path().'/payroll_summary_uploads/';

				$file->move($path, $filename);
		
				$payroll_summary->path = 'payroll_summary_uploads/'.$filename;
			}
		}


		$table = Excel::selectSheets('Sheet1')->load(public_path().'/'.$payroll_summary->path, function($reader) {

	    $reader->noHeading()->skip(5)->take(1)->formatDates(false);
	
	})->get();

		$recruit_contract = Recruitcontract::whereEmployeeId(Input::get('employeeid'))->whereEmployerId(Auth::user()->id)->first();		

		$basic_salary = (int) $recruit_contract->basic_pay;

		$percentage = (int) $recruit_contract->percentage;

		$percentage_value = $basic_salary / $percentage;

		$net_pay = 0;


		foreach ( $table as $row)
		{
			foreach ($row as $col)
			{
				$netpay = (int) $col;
			}
		}

		$take_home_pay = $netpay - $percentage_value;

		$payroll_summary->take_home_pay = $take_home_pay;

		$payroll_summary->employerid = Auth::user()->id;
		
		$payroll_summary->save();

		$this->notification->notify_about_payroll(Auth::user()->id, Input::get('employeeid'), $payroll_summary->id );

		return Redirect::to('employerside');
	}

}