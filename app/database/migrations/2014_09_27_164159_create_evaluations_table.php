<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluations', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('applicant_id')->index()->unsigned();
			$table->foreign('applicant_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('staff_id')->index()->unsigned();
			$table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
			
			$table->integer('job_id')->index()->unsigned();
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

			$table->integer('rating');
			$table->longtext('evaluation');
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
		Schema::drop('evaluations');
	}

}
