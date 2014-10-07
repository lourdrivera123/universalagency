<?php namespace UniversalAgency\Repositories

use Auth;
use Userattachment;

class UserAttachmentRepository {
	
	function addattachment($input)
	{
		$userattachment = new Userattachment;
		$userattachment->user_id = Auth::user()->id;

		if( !is_null($input['replyattachment']) )
		{
			$attachment = $input['replyattachment'];

			$attachmentname = $attachment->getClientOriginalName();

			$path = public_path().'/user_attachments/';
			
			$attachment->move($path, $attachmentname);

			$userattachment->name = $attachmentname;

			$userattachment->path = '/user_attachments/'.$attachmentname;
		}

		$userattachment->save();

	}

}