<?php namespace UniversalAgency\Repositories;

use Comment;

class CommentRepository {
	
	function create($input)
	{
		$comment = new Comment;
		$comment->name = $input['name'];
		$comment->email = $input['email'];
		$comment->subject = $input['subject'];
		$comment->message = $input['message'];
		$comment->save();

		return $comment;
	}

}