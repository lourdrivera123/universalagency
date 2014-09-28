<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePendingjobrequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pendingjobrequests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('job_id')->unsigned()->index();
			$table->string('request_status')->default('requesting for application approval');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
			$table->boolean('status');
            $table->softDeletes();
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
		Schema::drop('pendingjobrequests');
	}

}
