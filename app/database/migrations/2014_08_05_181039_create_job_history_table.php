<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('resume_id')->unsigned()->index();
			$table->foreign('resume_id')->references('id')->on('resume_info')->onDelete('cascade');
			$table->string('company_name');
			$table->string('title');
			$table->integer('month_from');
			$table->integer('year_from');
			$table->integer('month_to');
			$table->integer('year_to');
			$table->string('description');
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
		Schema::drop('job_history');
	}

}
