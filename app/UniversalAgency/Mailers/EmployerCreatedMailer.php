<?php namespace UniversalAgency\Mailers;


class EmployerCreatedMailer extends Mailer
{

	public function send($user, $employer, $randomPass)
	{
		
		$view = 'emails.employer_created_mailer';
		$data = [
					'businessname' => $employer->businessname,
					'password' => $randomPass,
					'email' => $user->email
				];

		$subject = 'You Account has been created';

		return $this->sendTo($user, $subject, $view, $data);
	}

} 