<?php

use UniversalAgency\Repositories\UserAttachmentRepository;

class UserAttachmentController extends \BaseController {

	protected $userattachment;

	function __construct(UserAttachmentRepository $userattachment)
	{
		$this->userattachment = $userattachment;
	}

	function adduserattachment()
	{
		$userattachment = $this->userattachment->addattachment(Input::all());

		return $userattachment;
	}

}