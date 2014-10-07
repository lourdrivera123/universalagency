<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->longtext('description');
			$table->string('job_title');
			$table->integer('job_category')->unsigned()->index();
			$table->string('location');
			$table->integer('company')->unsigned()->index();
			$table->foreign('job_category')->references('id')->on('jobcategories')->onDelete('cascade');
			$table->foreign('company')->references('id')->on('employer_info')->onDelete('cascade');
			$table->string('gender');
			$table->integer('agefrom');
			$table->integer('ageto');
			$table->string('education');
			$table->integer('minimumyearsofexperience');
			$table->string('others');
			$table->date('invitationexpiration');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jobs');
	}

}
