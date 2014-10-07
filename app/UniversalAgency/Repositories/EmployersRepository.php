<?php namespace UniversalAgency\Repositories;

use Event;
use Employer;
use Image;
use UniversalAgency\Repositories\UsersRepository;

class EmployersRepository {

	protected $user;

	function __construct(UsersRepository $user)
	{
		$this->user = $user;
		Event::listen('employer.create','UniversalAgency\Mailers\EmployerCreatedMailer@send');
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
		$employer = new Employer;
		$employer->businessname = $input['businessname'];
		$employer->businesstype = $input['businesstype'];
		$employer->phone_number = $input['phone_number'];
		$employer->address = $input['address'];
		$employer->description = $input['description'];
		$employer->user_id = $user->id;
		
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
				$path = public_path('images/employer_pictures/' . $imagename);
				Image::make($image->getRealPath())->save($path);
				$employer->photo  =   '/images/employer_pictures/'.$imagename;
			}
		} else {
			$employer->photo  =   '/images/employer_pictures/user.jpg';
		}

		$employer->save();

		Event::fire('employer.create', [$user, $employer, $randomPass]);

		return $employer;
	}	

	function update($input)
	{
		$employer = Employer::findOrFail($input['employer_id']);
		$employer->businessname = $input['businessname'];
		$employer->businesstype = $input['businesstype'];
		$employer->phone_number = $input['phone_number'];
		$employer->address = $input['address'];
		$employer->description = $input['description'];
		
		if( !is_null($input['editphoto']) )
		{
			$image = $input['editphoto'];
			$imagename = md5(date('YmdHis')).'.jpg';

			if ($image->getMimeType() == 'image/png'
				|| $image->getMimeType() == 'image/jpg'
				|| $image->getMimeType() == 'image/gif'
				|| $image->getMimeType() == 'image/jpeg'
				|| $image->getMimeType() == 'image/pjpeg')
			{
				$path = public_path('images/employer_pictures/' . $imagename);
				Image::make($image->getRealPath())->save($path);
				$employer->photo  =   'images/employer_pictures/'.$imagename;
			}
		}

		$employer->save();

		return $employer;
	}

	function disable($input)
	{
		$employer = Employer::findOrFail($input['id']);
		$employer->user()->first()->delete();

		return $employer;
	}

	function enable($input)
	{
		$employer = Employer::findOrFail($input['id']);
		$employer->user()->withTrashed()->first()->restore();

		return $employer;
	}

	function checkBusinessName($input)
	{
		$employer = Employer::whereBusinessname($input['businessname'])->first();

		if(count($employer) > 0){

			if( !is_null($input['employer_id']) && $input['employer_id'] == $employer->id )
			{

				return 'true';
			} else {

				return 'false';
			}

		}
		return 'true';
	}

	function checkEmployerPhoneNumber($input)
	{
		$employer = Employer::wherePhoneNumber($input['phone_number'])->first();

		if(count($employer) > 0){

			if( !is_null($input['employer_id']) && $input['employer_id'] == $employer->id )
			{

				return 'true';
			} else {

				return 'false';
			}

		}
		return 'true';
	}

	function listemployers()
	{
		$employers = Employer::lists('businessname', 'user_id');

		return $employers;
	}

	function get_employer_by_id($id)
	{
		$employer = Employer::findOrFail($id);

		return $employer;
	}

	function get_all_employers()
	{
		$employers = Employer::all();

		return $employers;
	}

	function get_random_employers_and_take_only($num_of_employers)
	{
		$employers = Employer::orderBy(DB::raw('RAND()'))->take($num_of_employers)->get();

		return $employers;
	}

	function get_employers_by_businessname($keyword)
	{
		$employers = Employer::where('businessname', 'LIKE', '%'.$keyword.'%')->get();

		return $employers;
	}
}