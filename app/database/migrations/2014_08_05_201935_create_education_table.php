<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('education', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('resume_id')->unsigned()->index();
			$table->foreign('resume_id')->references('id')->on('resume_info')->onUpdate('cascade')->onDelete('cascade');
			$table->string('school_name');
			$table->integer('degree_level')->unsigned()->index();
			$table->foreign('degree_level')->references('id')->on('degreelevels')->onUpdate('cascade')->onDelete('cascade');
			$table->string('field_of_study');
			$table->string('year_from_education');
			$table->string('year_to_education');
			$table->string('additional_notes');
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
		Schema::drop('education');
	}

}
