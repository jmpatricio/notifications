<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_actions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('trigger_id')->references('id')->on('notification_triggers');
			$table->string('type')->comment('Notification type');
			$table->longText('configuration')->nullable()->default(null)->comment('Action configuration');
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
		Schema::drop('notification_actions');
	}

}
