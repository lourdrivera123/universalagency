<?php namespace UniversalAgency\Mailers;


class StaffCreatedMailer extends Mailer
{

	public function send($user, $staff, $randomPass)
	{
		
		$view = 'emails.staff_created_mailer';
		$data = [
					'name' => $staff->first_name.' '.$staff->last_name,
					'password' => $randomPass,
					'email' => $user->email
				];

		$subject = 'You Account has been created';

		return $this->sendTo($user, $subject, $view, $data);
	}

} 