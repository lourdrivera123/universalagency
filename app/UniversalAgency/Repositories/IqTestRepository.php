<?php namespace UniversalAgency\Repositories;

use Usertestresult;
use Iqquestion;
use Auth;
use Hash;
use Iqresult;

class IqTestRepository {

	function generateRandomString($length = 6) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	function getAllQuestions()
	{
		return Iqquestion::all();
	}

	function measureIq($input)
	{
		$iqanswers = Iqquestion::all();
		$score = 0;
		$iq = 0;


		foreach ($iqanswers as $iqanswer)
		{
			if ( isset($input['question'.$iqanswer->id]) && $input['question'.$iqanswer->id] == $iqanswer->answer )
			{
				$score = $score + 1;
			}
		}

		$iq = ($score * 2) + 70;

		return $iq;
	}

	function identifyIq($iq)
	{

		$iq_result = "";

		if($iq >= 70 && $iq <= 79) {
			$iq_result = " a very low intelligence";
		}
		else if($iq >= 80 && $iq <= 89) {
			$iq_result = " a below average intelligence";
		}
		else if($iq >= 90 && $iq <= 109) {
			$iq_result = " a normal or average intelligence";
		}
		else if($iq >= 110 && $iq <= 119) {
			$iq_result = " a high intelligence";
		}
		else if($iq >= 120 && $iq <= 129) {
			$iq_result = " a superior intelligence";
		}
		else if($iq >= 130 && $iq <= 139) {
			$iq_result = " a very superior intelligence";
		}
		else {
			$iq_result = " an exceptional intelligence";			
		}

		return $iq_result;
	}

	function recordIqTest($result)
	{
		$iqresult = new Iqresult;
		$iqresult->user_id = Auth::user()->id;
		$iqresult->hash = md5(date('YmdHis').$this->generateRandomString());
		$iqresult->result = $result;
		$iqresult->save();

		return $iqresult;
	}

	function getTestResult($hash)
	{
		$result = Iqresult::whereHash($hash)->first();
	
		return $result;
	}

	function get_all_iq_results()
	{
		$iq = Iqresult::all();

		return $iq;
	}

	function get_iqresult_by_id($id)
	{
		$iqresult = Iqresult::findOrFail($id);

		return $iqresult;
	}

}