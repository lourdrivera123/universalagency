<?php namespace UniversalAgency\Mailers;


class ApplicantInvitationMailer extends Mailer
{

	public function send($user, $notification, $job)
	{
		$view = 'emails.applicant_invitation_mailer';
		$data = [
					'firstname' => $user->resume()->first()->first_name,
					'lastname' => $user->resume()->first()->last_name,
					'email' => $user->email,
					'notificationid' => $notification->id,
					'jobtitle' => $job->job_title
				];

		$subject = 'You have been invited for a job';

		return $this->sendTo($user, $subject, $view, $data);
	}

} 