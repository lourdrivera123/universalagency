<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from_userid')->unsigned()->index();
			$table->integer('to_userid')->unsigned()->index();
            $table->foreign('from_userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_userid')->references('id')->on('users')->onDelete('cascade');
			$table->integer('jobid')->index()->unsigned();
			$table->string('subject');
			$table->string('status')->default('unread');
			$table->softDeletes();
			$table->longtext('message');
			$table->timestamps();
		});
	}

//fuck
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
	}

}
