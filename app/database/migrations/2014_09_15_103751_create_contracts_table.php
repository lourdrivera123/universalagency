<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('contract_title');
			$table->double('salary');
			$table->integer('num_of_employees')->index()->unsigned();
			$table->string('job');
			$table->integer('employer')->index()->unsigned();
            $table->foreign('employer')->references('id')->on('users')->onDelete('cascade');
            $table->string('cut_off_period');
            $table->date('starting_date');
			$table->date('closing_date');
			$table->string('employmenttype');
			$table->string('other');
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
		Schema::drop('contracts');
	}

}
