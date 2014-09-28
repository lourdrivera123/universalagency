<?php namespace UniversalAgency\Repositories;

use Auth;
use Hash;
use Usertestresult;
use Personalityquestion;
use Personalityresult;

class PersonalityTestRepository {

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
		return Personalityquestion::all();
	}

	function measurePersonality($input)
	{
		$stabili = 0;
		$crisisMgr = 0;
		$bigPicture = 0;
		$harmonizer = 0;

		for ($x=1; $x<=13; $x++) {

			if ( $input['question'.$x] == 'stabili' )
			{
				$stabili = $stabili + 1;
			} else if ( $input['question'.$x] == 'crisisMgr')
			{
				$crisisMgr = $crisisMgr + 1;
			
			} else if ( $input['question'.$x] == 'bigPicture')
			{
				$bigPicture = $bigPicture + 1;
			} else if ( $input['question'.$x] == 'harmonizer')
			{
				$harmonizer = $harmonizer + 1;
			} else if ( $input['question'.$x] == 'stabili/bigPicture')
			{
				if ( $stabili > $bigPicture )
				{
					$stabili = $stabili + 1;

				} else if( $bigPicture > $stabili) {
					$bigPicture = $bigPicture + 1;
				}
			} else if ( $input['question'.$x] == 'crisisMgr/harmonizer' )
			{
				if ( $crisisMgr > $harmonizer )
				{
					$crisisMgr = $crisisMgr + 1;

				} else if( $harmonizer > $crisisMgr) {
					$harmonizer = $harmonizer + 1;
				}
			}

		}

		if( $stabili == max($stabili, $crisisMgr, $bigPicture, $harmonizer))
			return 'stabili';

		if( $crisisMgr == max($stabili, $crisisMgr, $bigPicture, $harmonizer))
			return 'crisisMgr';

		if( $bigPicture == max($stabili, $crisisMgr, $bigPicture, $harmonizer))
			return 'bigPicture';

		if( $harmonizer == max($stabili, $crisisMgr, $bigPicture, $harmonizer))
			return 'harmonizer';

	}

	function recordpersonalityresult($result)
	{
		$personalityresut = new Personalityresult;
		$personalityresut->user_id = Auth::user()->id;
		$personalityresut->hash = md5(date('YmdHis').$this->generateRandomString());
		$personalityresut->result = $result;
		$personalityresut->save();

		return $personalityresut;
	}

	function getResult($hash)
	{
		return Personalityresult::whereHash($hash)->first();
	}
}