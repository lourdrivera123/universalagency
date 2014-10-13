<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTablePayrollsummary extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('table_payrollsummary', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employeeid')->unsigned()->index();
			$table->integer('month');
			$table->string('path');
			$table->integer('employerid')->unsigned()->index();
			$table->double('take_home_pay');
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
		Schema::drop('table_payrollsummary');
	}

}
