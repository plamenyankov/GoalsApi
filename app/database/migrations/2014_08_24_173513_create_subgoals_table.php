<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubgoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subgoals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('goal_id');
			$table->string('progress_type');
			$table->string('progress_time');
			$table->integer('frequency');
			$table->string('measure_type');
			$table->string('auto_deadline');
			$table->integer('start_val');
			$table->integer('end_val');
			$table->date('start_date');
			$table->date('end_date');
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
		Schema::drop('subgoals');
	}

}
