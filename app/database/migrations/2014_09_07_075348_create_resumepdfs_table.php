<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResumepdfsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resumepdfs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('resume_id')->unsigned()->index();
			$table->foreign('resume_id')->references('id')->on('resume_info')->onUpdate('cascade')->onDelete('cascade');
			$table->string('path');
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
		Schema::drop('resumepdfs');
	}

}
