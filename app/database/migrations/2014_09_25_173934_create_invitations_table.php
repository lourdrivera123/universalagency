<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invitations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_id')->unsigned()->index();
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
			$table->integer('applicant_id')->unsigned()->index();
			$table->foreign('applicant_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('job_category')->unsigned()->index();
			$table->foreign('job_category')->references('id')->on('jobcategories')->onDelete('cascade');
			$table->string('request_status')->default('pending');
			$table->boolean('status')->default(0);
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
		Schema::drop('invitations');
	}

}
