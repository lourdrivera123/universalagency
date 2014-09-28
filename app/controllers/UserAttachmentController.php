<?php

class UserAttachmentController extends \BaseController {

	function adduserattachment()
	{
		$userattachment = new Userattachment;
		$userattachment->user_id = Auth::user()->id;

		// if( !is_null($input['photo']) )
		if( Input::hasFile('replyattachment') )
		{
			$attachment = Input::file('replyattachment');

			$attachmentname = $attachment->getClientOriginalName();

			$path = public_path().'/user_attachments/';
			
			$attachment->move($path, $attachmentname);

			$userattachment->name = $attachmentname;

			$userattachment->path = '/user_attachments/'.$attachmentname;
		}

		$userattachment->save();

		return $userattachment;
	}

}