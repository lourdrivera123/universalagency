<?php

use Carbon\Carbon;
use Illuminate\Support\Collection as Collection;


function ago($datetime)
{
	return $datetime->diffForHumans();
}

function isApplicant()
{
	if(Auth::check())
    {
        if( Auth::user()->roles()->first()->id == 1 )
        	return true;

        return false;
    }

    return false;
}

function isEmployer()
{
	if(Auth::check())
    {
        if( Auth::user()->roles()->first()->id == 2 )
        	return true;
        
        return false;
    }
}

function isAdmin()
{
	if(Auth::check())
    {
        if( Auth::user()->roles()->first()->id == 3 )
        	return true;
        
        return false;
    }

    return false;
}

function authenticateduser()
{
    return Auth::user();
}

function getAssociatedPersonalityAns($id)
{
    return Personalityanswer::whereQuestionId($id)->get();
}

function countpendingjobrequests($requestid)
{
    $pendingjobrequest = Pendingjobrequest::whereJobId($requestid)->whereStatus(0)->get();
    
    return count($pendingjobrequest).' new';
}

function countcandidate($requestid)
{
    $candidate = Candidate::whereJobId($requestid)->whereStatus(0)->get();
    
    return count($candidate).' new';
}

function calculateAge($birthdate)
{
  //explode the date to get month, day and year
    $birthDate = explode("-", $birthdate);
  //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));

    return  $age;
}

function gethighesteducation($resume)
{
    $degreelevel = 0;
    $educations = $resume->education()->get();

    foreach ($educations as $education)
    {
        if ($degreelevel < $education->degree_level )
            $degreelevel = $education->degree_level;
    }

    $degreelevelmodel = Degreelevel::find($degreelevel);

    return $degreelevelmodel->levelname;
}

function getmaximumworkexp($resume)
{
    $yrsofexperience = 0;

    $jobhistories = $resume->jobhistory()->get();
    foreach( $jobhistories as $jobhistory )
    {
        $d1 = new DateTime($jobhistory->year_to.'-'.$jobhistory->month_to.'-01');
        $d2 = new DateTime($jobhistory->year_from.'-'.$jobhistory->month_from.'-01');

        $diff = $d2->diff($d1);

        if ($yrsofexperience < $diff->y)
            $yrsofexperience = $diff->y;
    }
    
    return $yrsofexperience;
}

function getPosition($id)
{
    $jobcategory = Jobcategory::find($id);
    
    return $jobcategory->category;
}

function checkresumeifcomplete()
{
    if(Auth::check())
    {
        if( !empty(Auth::user()->resume()->first()->titleofexpertise) )
            return true;
        
        return false;
    }
}

function formatdate($date)
{
 $datetime = explode("-", $date);
 $finaldate = Carbon::createFromDate($datetime[0], $datetime[1], $datetime[2])->toFormattedDateString();

 return $finaldate;
}

function datedifference($timestamp)
{
    $created = new Carbon($timestamp);
    $now = Carbon::now();
    
    $difference = ($created->diff($now)->days < 1)
    ? 'today'
    : $created->toFormattedDateString();

    return $difference;
}

function isInvited($userid, $jobid)
{
    $invitation = Invitation::whereApplicantId($userid)->whereJobId($jobid)->first();

    if(count($invitation) > 0)
    {
        if ( $invitation->request_status == 'pending' )
            return true;
    } 
    return false;
}

function hasBeenInvitedButDeclined($userid, $jobid)
{
    $invitation = Invitation::whereApplicantId($userid)->whereJobId($jobid)->first();

    if(count($invitation) > 0)
    {
        if ( $invitation->request_status == 'declined' )
            return true;
    } 
    return false;   
}

function hasBeenInvitedAndAccepted($userid, $jobid)
{
    $invitation = Invitation::whereApplicantId($userid)->whereJobId($jobid)->first();

    if(count($invitation) > 0)
    {
        if ( $invitation->request_status == 'accepted' )
            return true;
    } 
    return false;   
}

function checkIfApplicantRequested($userid, $jobid)
{
    $candidate = Pendingjobrequest::whereUserId($userid)->whereJobId($jobid)->first();
    
    if(count($candidate) > 0 ) 
    {
        // return true;
        if ( $candidate->request_status == 'requesting for application approval' )
        {
            return true;
        }

        return false;
    }

    return false;
}

function checkIfApplicantRequestedButDisapproved($userid, $jobid)
{
    $candidate = Pendingjobrequest::whereUserId($userid)->whereJobId($jobid)->first();
    
    if(count($candidate) > 0 ) 
    {
        // return true;
        if ( $candidate->request_status == 'declined' )
        {
            return true;
        }

        return false;
    }

    return false;
}

function checkIfApplicantRequestedAndApproved($userid, $jobid)
{
    $candidate = Pendingjobrequest::whereUserId($userid)->whereJobId($jobid)->first();
    
    if(count($candidate) > 0 ) 
    {
        // return true;
        if ( $candidate->request_status == 'approved' )
        {
            return true;
        }

        return false;
    }

    return false;
}

function requeststatus($userid, $jobid)
{
    $candidate = Pendingjobrequest::whereUserId($userid)->whereJobId($jobid)->first();
    
    if(count($candidate) > 0 ) 
    {
        return $candidate->request_status;
    }
}

function getAdminId()
{
    $roleadmin = Role::whereName('admin')->first(); 
    $admin = $roleadmin->user()->first()->id;

    return $admin;
}

function isStaff()
{
    if(Auth::check())
    {
        if( Auth::user()->roles()->first()->id == 4 )
            return true;

        return false;
    }

    return false;
}

function getTestResults($iqs, $personalities)
{
    $tests = new Collection;

    foreach ( $iqs as $iq )
    {
        $testcollection = new Collection;
        $testcollection->iqid = $iq->id;
        $testcollection->userid = $iq->user_id;
        $testcollection->iq_created_at = $iq->created_at;
    }

    foreach ( $personalities as $personality )
    {
        $testcollection->personalityid = $personality->id;
        $testcollection->userid = $personality->user_id;
        $testcollection->personality_created_at = $personality->created_at;

        $tests->push($testcollection);
    }

    return $tests;
}

function checkIfUserHasTakenTests($userid)
{  
    $personalityresult = User::find($userid)->personalityresult()->first();
    $iqresult = User::find($userid)->iqresult()->first();

    if ( is_null($personalityresult) )
    {
        return 'did not take personality test';
    }

    if ( is_null($iqresult) )
    {
        return 'did not take iq test';
    }

    return 'all tests taken!';
}

function getSalary($jobtitle)
{
    $salary = Contract::whereJob($jobtitle)->first()->salary;

    return $salary;
}

function getPersonalityResult()
{
    return Auth::user()->personalityresult()->first();
}

function getIQResult()
{
    return Auth::user()->iqresult()->first();
}

function getEmployerName($userid)
{  
    $user = User::find($userid);
    $employername = $user->employer()->first()->businessname;

    return $employername;
}

function getMonthNow()
{
    return Carbon::now()->month;
}

function getDayNow()
{
    return Carbon::now()->day;
}

function getYearNow()
{
    return Carbon::now()->year;
}

function formatdatestring($date)
{
    $formatteddate = new Carbon($date);
    
    return $formatteddate->toFormattedDateString();
}

function isHired()
{
    if(Auth::check())
    {
        if( Auth::user()->roles()->first()->id == 1 )
            if(Auth::user()->resume->first()->status == 'hired')
                return true;       

        return false;
    }

    return false;
}

function daydatetimestring($timestamp)
{
    $datetime = new Carbon($timestamp);

    return $datetime->toDayDateTimeString();
}

function getCandidateUsingEvaluationId($evaluation)
{
    $candidate = Candidate::whereJobId($evaluation->job_id)->whereApplicantId($evaluation->applicant_id)->first();

    return $candidate;
}

function getEmployerIdUsingJobName($jobname)
{
    $employer = Contract::whereJob($jobname)->first()->employer;

    return $employer;
}


function getEmployeeByRecruitContract($id)
{
    return Resume::findOrFail($id);
}

function isTaken($jobid)
{
    $job =  Recruitcontract::whereJobId($jobid)->first();
    
    if(count($job) > 0)
        return true;

    return false;
}

function getUnreadMessages()
{
    $messages = Message::whereToUserid(Auth::user()->id)->whereStatus('unread')->orderby('id', 'DESC')->get();

    return $messages;
}

function getUnreadNotifications()
{
    $notifications = Notification::whereToUserid(Auth::user()->id)->whereStatus('unread')->orderBy('created_at', 'DESC')->get();

    return $notifications;
}

function getEmployeePhoto($id)
{
    $employee = User::findOrFail($id);
    $resume = $employee->resume()->first();
    
    return $resume->photo;
}

function getJobTitle($id)
{
    $job = Job::withTrashed()->findOrFail($id);

    return $job;
}


function getCompleteName($id)

{
    $employee = User::findOrFail($id);
    $resume = $employee->resume()->first();
    
    return $resume->first_name.' '.$resume->last_name;   
}

function getAddress($id)
{
    $employee = User::findOrFail($id);
    $resume = $employee->resume()->first();

    return $resume->address;
}

function getEmail($id) 
{
    $employee = User::findOrFail($id);

    return $employee->email;
}

function check_if_slot_is_not_available($jobid)
    {
        $jobtitle = Job::withTrashed()->findOrFail($jobid)->job_title;

        $num_of_employees = count(Recruitcontract::whereJobId($jobid)->get());

        $num_of_employees_from_contract = Contract::whereJob($jobtitle)->first()->num_of_employees;

        if($num_of_employees >= $num_of_employees_from_contract )
        {
            return true;
        } else {
            return false;
        }
    }

function getContractIDByJobTitle($title)
{
     $contractid = Contract::whereJob($title)->first()->id;

    return $contractid;
}