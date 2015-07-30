<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_triggers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->unique()->notNull()->comment('Trigger slug');
			$table->text('description')->nullable()->default(null)->comment('Trigger description');
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
		Schema::drop('notification_triggers');
	}

}
