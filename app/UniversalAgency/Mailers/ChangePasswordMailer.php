<?php namespace UniversalAgency\Mailers;


class ChangePasswordMailer extends Mailer
{

	public function notify($user)
	{
		
		$view = 'emails.change_password_mailer';
		$data = [
					'firstname' => $user->first_name,
					'email' => $user->email
				];

		$subject = 'You just changed your password @ Universal Agency Account';

		return $this->sendTo($user, $subject, $view, $data);
	}

} 