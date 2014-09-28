<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIqquestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iqquestions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('quesno');
			$table->string('questions');
			$table->string('option_A');
			$table->string('option_B');
			$table->string('option_C');
			$table->string('option_D');
			$table->string('answer');
			$table->string('difficulty');
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
		Schema::drop('iqquestions');
	}

}
