<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalityanswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personalityanswers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('question_id')->unsigned()->index();
			$table->foreign('question_id')->references('id')->on('personalityquestions')->onUpdate('cascade')->onDelete('cascade');
			$table->string('personality');
			$table->string('answer');
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
		Schema::drop('personalityanswers');
	}

}
