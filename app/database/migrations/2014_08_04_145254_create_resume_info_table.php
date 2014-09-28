<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResumeInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('first_name');
			$table->string('last_name');
			$table->date('birth_date');
			$table->string('gender');
			$table->string('marital_status');
			$table->string('phone_number');
			$table->string('address');
			$table->string('photo');
			$table->longtext('overview');
			$table->integer('position_desired')->unsigned()->index();
			$table->foreign('position_desired')->references('id')->on('jobcategories')->onDelete('cascade');
			$table->string('titleofexpertise');
			$table->string('status');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_info');
	}

}
