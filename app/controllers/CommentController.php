<?php
use UniversalAgency\Forms\FormValidationException;
use UniversalAgency\Forms\CommentForm;
use UniversalAgency\Repositories\CommentRepository;

class CommentController extends \BaseController {

	protected $commentform;
	protected $comment;

	function __construct(CommentForm $commentform, CommentRepository $comment)
	{
		$this->commentform = $commentform;
		$this->comment = $comment;
	}

	function store()
	{
		try
		{
			$this->commentform->validate(Input::all());

			$comment = $this->comment->create(Input::all());

			return Redirect::to('contact')->withFlashMessage('Your comment has been sent.');
		}
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}
}