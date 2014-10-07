<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecruitContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recruit_contracts', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('employee_id')->index()->unsigned();
			$table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('employer_id')->index()->unsigned();
			$table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('job_id')->index()->unsigned();
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
			
			$table->integer('percentage');
			$table->double('basic_pay');
			// $table->date('starting_date');
			// $table->date('closing_date');
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
		Schema::drop('recruit_contracts');
	}

}