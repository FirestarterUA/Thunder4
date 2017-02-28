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
			$table->increments('id');
			$table->string('slug')->nullable();
			$table->string('name')->nullable();
			$table->integer('domain_id')->default(1);
			$table->integer('parent_id')->default(1);
			$table->integer('nest_left');
			$table->integer('nest_right');
			$table->integer('nest_depth')->default(0);

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
