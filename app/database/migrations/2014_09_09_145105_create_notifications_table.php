<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('from_userid')->unsigned()->index();
			$table->integer('to_userid')->unsigned()->index();
			
			$table->integer('employerid')->unsigned()->index()->default(0);
			$table->integer('jobid')->unsigned()->index()->default(0);

            $table->foreign('from_userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_userid')->references('id')->on('users')->onDelete('cascade');
			
			$table->string('notification_category');
			$table->string('subject');
			$table->longtext('message');
			$table->string('status')->default('unread');			
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
		Schema::drop('notifications');
	}

}
