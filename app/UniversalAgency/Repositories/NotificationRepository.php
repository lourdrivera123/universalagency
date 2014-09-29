<?php namespace UniversalAgency\Repositories;

use UniversalAgency\Repositories\UsersRepository;
use Notification;
use Job;

class NotificationRepository {

	protected $user;

	function __construct(UsersRepository $user)
	{
		$this->user = $user;
	}

	function createInvitationNotification($job, $from_userid, $to_userid, $subject, $employerid)
	{
		$firstname = $this->user->getUserById($to_userid)->resume()->first()->first_name;
		
		$notification = new Notification;
		$notification->from_userid = $from_userid;
		$notification->to_userid = $to_userid;
		$notification->employerid = $employerid;
		$notification->jobid = $job->id;
		$notification->subject = $subject;
		
		$notification->message = 'Hi '.$firstname.'!<br/>
		We have a new Job opening and we see that your skills suited the job requirements. 
		If you are interested on this job, Please see the job description. 

		<br/><br/>
		We hope to hear from you soon. 
		<br/><br/>
		Thank you.
		<br/><br/>';

		$notification->save();

		return $notification;
	}
	
	function sendApproveRequest( $jobtitle, $firstname, $to_userid, $employerid, $jobid )
	{
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->employerid = $employerid;
		$notification->jobid = $jobid;
		$notification->subject = 'Your Request to "'.$jobtitle.'" has been approved';
		$notification->message = 'Dear '.$firstname.', 
		<br/><br/>
		We would like to Inform you that your request for application to '.$jobtitle.' has been approved.
		<br/><br/>';
		$notification->save();
		
		return $notification;		
	}

	function sendDisapproveRequest( $jobtitle, $firstname, $to_userid, $employerid, $jobid )
	{
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->employerid = $employerid;
		$notification->jobid = $jobid;
		$notification->subject = 'Your Request to "'.$jobtitle.'" has been disapproved';
		$notification->message = 'Dear '.$firstname.': 
		<br/><br/>
		We\'re sorry to inform you that your request for application to '.$jobtitle.' has been disapproved. 
		Your skills does not suit the job qualifications. However, there are still job openings that may suit your skills. 
		Please feel free to browse our Job Board. Thank you.
		<br/><br/>';
		$notification->save();
		
		return $notification;
	}

	function allUpForTakingTests( $employerid, $to_userid )
	{
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->employerid = $employerid;
		$notification->subject = 'All tests have taken!';
		$notification->message = 'Thank you for taking the tests! We are still reviewing your IQ and Personality test results. 
		For the meantime, you may also look for other job openings that suits your personality
		<br/><br/>

		<a href="../../joblist" class="btn btn-primary" target="_blank">View Job Board</a>';
		$notification->save();
		
		return $notification;
	}

	function pre_notify_applicant_for_interview($timestamp, $to_userid )
	{
		//this is called in the interview controller after creating the scheduled interview
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->subject = 'You have an interview';
		$notification->message = 'Important reminder! You have a scheduled interview on '.daydatetimestring($timestamp).'. Our Staff will call you on the specified date and time, so please be present. Please <a href="../../applicantinterviewee" style="color:blue">click here</a> to go through the interview page';
		$notification->save();

		return $notification;
	}

	function pre_notify_staff_for_interview($timestamp, $to_userid)
	{
		//this is called in the interview controller after creating the scheduled interview
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->subject = 'You have an interview';
		$notification->message = 'Important reminder! You have a scheduled interview on '.daydatetimestring($timestamp).'. Please be present 10 - 20 minutes before the schedule, to prepare calling the applicant. Please <a href="../../staffinterviewer" style="color:blue">click here</a> to go through the interview page';
		$notification->save();

		return $notification;
	}

	function notify_staff_for_interview_today($timestamp, $to_userid, $applicantid, $jobid)
	{
		//this is called in the interview repository in the notifyInterviewerandIntervieweeToday method
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->subject = 'You have an interview';
		$notification->message = 'Important reminder! You have a scheduled interview on '.daydatetimestring($timestamp).'. Please be present 10 - 20 minutes before the schedule, to prepare calling the applicant. Please <a style="color:blue" href="../../staffinterviewer?applicantid='.$applicantid.'&jobid='.$jobid.'">click here</a> to go through the interview page';
		$notification->save();

		return $notification;
	}

	function notify_applicant_for_interview_today($timestamp, $to_userid)
	{
		//this is called in the interview repository in the notifyInterviewerandIntervieweeToday method
		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->subject = 'You have an interview';
		$notification->message = 'Important reminder! You have a scheduled interview on '.daydatetimestring($timestamp).'. Please be present 10 - 20 minutes before the schedule, to prepare for the call. Please <a style="color:blue" href="../../applicantinterviewee">click here</a> to go through the interview page';
		$notification->save();

		return $notification;
	}

	function sendSorryNoteForBeingDeclined($to_userid, $jobid)
	{
		$job = Job::findOrFail($jobid);

		$notification = new Notification;
		$notification->from_userid = getAdminId();
		$notification->to_userid = $to_userid;
		$notification->subject = 'Notification about the past application and interview for "'.$job->job_title.'"';
		$notification->message = 'We already reviewed your evaluation and resume, unfortunately you didn\'t match the qualifications for the job. Anyhow, you can still browse for available jobs and apply.';
		$notification->save();

		return $notification;
	}

}