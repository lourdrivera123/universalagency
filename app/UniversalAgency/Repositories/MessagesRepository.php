<?php namespace UniversalAgency\Repositories;

use Message;
use Auth;
use UniversalAgency\Repositories\UsersRepository;

class MessagesRepository {

	protected $user;

	function __construct(UsersRepository $user)
	{
		$this->user = $user;
	}

	// function messages()
	// {
	// 	$messages = Message::all();
	// 	return View::make('applicant.messages')
	// 	->withMessages($messages);
	// }

	// function viewmessage($id)
	// {
	// 	$specificmsg = Message::findOrFail($id);

	// 	return View::make('applicant.messages')
	// 	->withSpecificmsg($specificmsg);
	// }

	function createInvitationMessage($job, $from_userid, $to_userid, $subject)
	{
		$firstname = $this->user->getUserById($to_userid)->resume()->first()->first_name;
		// $firstname = $to_userid;
		$message = new Notification;
		$message->from_userid = $from_userid;
		$message->to_userid = $to_userid;
		$message->subject = $subject;
		$message->jobid = $job->id;
		$message->message = 'Hi '.$firstname.',
		We are Inviting you for a Job Vacancy. You might be the one we are waiting for,
		Please see the job description.

		<br/><br/>
		Then let us know your decision.

		Thank you.

		~ Universal Agency
		';
		$message->save();

		return $message;
	}

	function sendtestrequirements($candidate)
	{
		// $firstname = $this->user->getUserById($to_userid)->resume()->first()->first_name;
		// // $firstname = $to_userid;
		// $message = new Message;
		// $message->from_userid = 2;
		// $message->to_userid = $candidate->applicant_id;
		// $message->subject = $subject;
		// $message->jobid = $candidate->job_id;

		// $message->message = 'Thank you for accepting the invitation. You can now proceed to the next process.
  //       <br/><a href="../../../personalitytest">Take Personality Test</a>
  //       <br/><a href="../../../iqtest">Take IQ Test</a>';

		// $message->save();

		// return $message;
	}

	function getUsersMessage()
	{
		$messages = Message::whereToUserid(Auth::user()->id)->get();

		return $messages;
	}

	function findMessage($id)
	{
		$message = Message::findOrFail($id);

		return $message;
	}

	function sendMessageFromAdmin($input)
	{

		$recipients = explode(",", $input['recipient']);

		foreach ( $recipients as $recipient )
		{
			$message = new Message;
			$message->from_userid = Auth::user()->id;
			$message->to_userid = $this->user->getUserIdByEmail($recipient);
			$message->subject = $input['subject'];
			$message->message = $input['message'];
			$message->save();
		}		

		// return $message;
		return 'All done!';
	}

	function replymessage($input)
	{
		$message = new Message;
		$message->from_userid = Auth::user()->id;
		$message->to_userid = getAdminId();
		$message->subject = $input['subject'];
		$message->message = $input['message'];
		$message->save();

		return $message->message;
	}

}