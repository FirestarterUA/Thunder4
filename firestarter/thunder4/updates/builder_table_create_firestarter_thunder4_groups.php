<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFirestarterThunder4Groups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('firestarter_thunder4_groups', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('firestarter_thunder4_groups');
	}

}
