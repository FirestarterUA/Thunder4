<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFirestarterThunder4Categories extends Migration 
{
	public function up()
	{
		Schema::create('firestarter_thunder4_categories', function($table)
		{
			$table->engine = 'InnoDB';
			$table->integer('id');
			$table->string('slug');
			$table->string('name');
			$table->integer('domain_id');
			$table->integer('parent_id');
			$table->integer('nest_left');
			$table->integer('nest_right');
			$table->integer('nest_depth');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('firestarter_thunder4_categories');
	}

}
