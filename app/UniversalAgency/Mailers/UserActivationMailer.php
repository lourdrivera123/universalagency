<?php namespace UniversalAgency\Mailers;


class UserActivationMailer extends Mailer
{

	public function send($user)
	{
		
		$view = 'emails.user_activation_mailer';
		$data = [
					'firstname' => $user->first_name,
					'token' => $user->activation->token,
					'email' => $user->email
				];

		$subject = 'Please Confirm Email';

		return $this->sendTo($user, $subject, $view, $data);
	}

} 