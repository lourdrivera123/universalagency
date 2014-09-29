<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtrsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dtrs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employeeid')->unsigned()->index();
			$table->integer('month');
			$table->string('path');
			$table->integer('employerid')->unsigned()->index();
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
		Schema::drop('dtrs');
	}

}
