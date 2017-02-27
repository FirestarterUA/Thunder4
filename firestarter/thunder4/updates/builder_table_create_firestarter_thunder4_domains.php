<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFirestarterThunder4Domains extends Migration 
{
	public function up()
	{
		Schema::create('firestarter_thunder4_domains', function($table)
		{
			$table->engine = 'InnoDB';
			$table->integer('id');
			$table->string('name');
			$table->string('theme');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('firestarter_thunder4_domains');
	}

}
