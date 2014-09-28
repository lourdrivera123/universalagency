<?php

use UniversalAgency\Repositories\MessagesRepository;

class MessagesController extends \BaseController {

	protected $message;

	function __construct(MessagesRepository $message)
	{
		$this->message = $message;
	}

	function messages()
	{
		$messages = $this->message->getUsersMessage();

		return View::make('applicant.messages')->withMessages($messages);
	}

	function viewmessage($id)
	{
		$specificmsg = $this->message->findMessage($id);

		return View::make('applicant.messages')
		->withSpecificmsg($specificmsg);
	}

	function sendMessageFromAdmin()
	{
		$message = $this->message->sendMessageFromAdmin(Input::all());

		return $message;
	}

	function replymessage()
	{
		$message = $this->message->replymessage(Input::all());

		return $message;
	}

}