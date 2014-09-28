<?php
use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\FaqForm;
use UniversalAgency\Repositories\FaqRepository;

class FaqController extends \BaseController {

	protected $faqform;
	protected $faq;

	function __construct(FaqForm $faqform, FaqRepository $faq)
	{
		$this->faqform = $faqform;
		$this->faq = $faq;
	}

	function store()
	{
		try
		{
			$this->faqform->validate(Input::all());

			$faq = $this->faq->create(Input::all());

			return Redirect::to('faq')->withFlashMessage('Your question has been sent.');
		}
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}
}