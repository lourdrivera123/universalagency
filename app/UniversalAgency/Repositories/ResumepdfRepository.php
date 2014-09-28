<?php namespace UniversalAgency\Repositories;

use Resumepdf;
use Auth;

class ResumepdfRepository {
	
	function create($filepath)
	{
		$resumepdf = new Resumepdf;
		$resumepdf->resume_id = Auth::user()->resume()->first()->id;
		$resumepdf->path = $filepath;
		$resumepdf->save();

		return $resumepdf;
	}

	function remove($id)
	{
		$resumepdf = Resumepdf::whereResumeId($id)->first();
		
		if(count($resumepdf) > 0)
		{
			unlink(public_path().$resumepdf->path);
			$resumepdf->delete();
		}

		return true;
	}

}