<?php namespace UniversalAgency\Repositories;

use Staff;
use Image;
use Event;

class StaffRepository {

	function __construct()
	{
		Event::listen('staff.create','UniversalAgency\Mailers\StaffCreatedMailer@send');
	}

	function generateRandomString($length = 6) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	function create($input, $randomPass, $user)
	{
		$staff = new Staff;
		$staff->first_name = $input['first_name'];
		$staff->last_name = $input['last_name'];
		$staff->phone_number = $input['phone_number'];
		$staff->address = $input['address'];
		$staff->user_id = $user->id;
		
		if( !is_null($input['photo']) )
		{
			$image = $input['photo'];
			$imagename = md5(date('YmdHis')).'.jpg';

			if ($image->getMimeType() == 'image/png'
				|| $image->getMimeType() == 'image/jpg'
				|| $image->getMimeType() == 'image/gif'
				|| $image->getMimeType() == 'image/jpeg'
				|| $image->getMimeType() == 'image/pjpeg')
			{
				$path = public_path('images/staff_pictures/' . $imagename);
				Image::make($image->getRealPath())->save($path);
				$staff->photo  =   '/images/staff_pictures/'.$imagename;
			}
		} else {
			$staff->photo  =   '/images/staff_pictures/user.jpg';
		}

		$staff->save();

		Event::fire('staff.create', [$user, $staff, $randomPass]);

		return $staff;
	}

}