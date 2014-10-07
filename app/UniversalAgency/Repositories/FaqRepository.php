<?php namespace UniversalAgency\Repositories;

use Faq;

class FaqRepository {

	function create($input)
	{
		$faq = new Faq;
		$faq->user_name = $input['user_name'];
		$faq->subject = $input['subject'];
		$faq->question = $input['question'];
		$faq->save();

		return $faq;
	}

	function get_all_faq()
	{
		$faq = Faq::all();
		
		return $faq;
	}
}