<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInterviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('staff_id')->unsigned()->index();
			$table->integer('applicant_id')->unsigned()->index();
			$table->string('event_title');
			$table->integer('event_date_year');
			$table->integer('event_date_month');
			$table->integer('event_date_day');
			$table->integer('event_time_hour');
			$table->integer('event_time_minute');
			$table->datetime('event_date_time');
			$table->string('additional_notes');
			$table->string('status')->default('active');
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
		Schema::drop('interviews');
	}

}
