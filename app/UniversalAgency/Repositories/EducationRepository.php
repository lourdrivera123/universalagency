<?php namespace UniversalAgency\Repositories;

use Education;

class EducationRepository {

	function create($input)
	{
		$education = new Education;
		$education->resume_id = $input['resume_id'];
		$education->school_name = $input['school_name'];
		$education->degree_level = $input['degree_level'];
		$education->field_of_study = $input['field_of_study'];
		$education->year_from_education = $input['year_from_education'];
		// $education->year_to_education = $input['year_to_education'];
		$education->additional_notes = $input['additional_notes'];

		// if( $input['year_to_education'] == 'Present' )
		// {
		// 	$education->year_to_education = 0;
		// }
		// else
		// {
			// $education->year_to_education = 0;
			$education->year_to_education = $input['year_to_education'];

		// }

		$education->save();

		return $education;
	}

	function delete($input)
	{
		$education = Education::findOrFail($input['id']);
		$education->delete();

		return 'deleted';
	}
}