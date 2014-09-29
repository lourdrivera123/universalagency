<?php

class DtrController extends \BaseController {

	function store()
	{
		$dtr = new Dtr;
		$dtr->name = Input::get('employeeid');
		$dtr->month = Input::get('month');
		
		if(Input::hasFile('file'))
		{
				$file = Input::file('file');
			
			if ($file->getMimeType() == 'application/vnd.ms-excel' )
			{
				$filename = md5(date('YmdHis')).'.xls';
                $path = public_path('dtruploads/' . $filename);

				$file->move($path, $filename);
		
				$dtr->path = $path;
			}
		}

		$dtr->employerid = Auth::user()->id;
		$dtr->save();

		return $dtr;
	}
}