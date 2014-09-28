<?php namespace UniversalAgency\Invitations\Mailchimp;

use UniversalAgency\Invitations\InvitationList as InvitationListInterface;
use Mailchimp;

class InvitationList implements InvitationListInterface {

	protected $mailchimp;

	protected $list = [
	'lessonSubscribers' => '987871807f'
	];

	function __construct(Mailchimp $mailchimp)
	{
		$this->mailchimp = $mailchimp;
	}

	function subscribeTo($listName, $email)
	{
		return $this->mailchimp->lists->subscribe(
			$this->lists[$listName],
			['email' => $email],
			 	null, //merge vars
			 	html, //email type
			 	false, //require double optn
			 	true //update existing customer
			 	);
	}

	function unsubscribeFrom($list, $email)
	{
		return $this->mailchimp->lists->subscribe(
			$this->lists[$listName],
			['email' => $email],
			 	false, //delete the member permanently
			 	false, //send goodbye email
			 	false //send unsubscribe notification
			 	);
	}

}