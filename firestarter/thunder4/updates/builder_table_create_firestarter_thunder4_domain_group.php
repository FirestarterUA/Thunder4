<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFirestarterThunder4DomainGroup extends Migration
{
	public function up()
	{
		Schema::create('firestarter_thunder4_domain_group', function($table)
		{
			$table->engine = 'InnoDB';
			$table->integer('domain_id')->unsigned();
			$table->integer('group_id')->unsigned();
			$table->primary(['domain_id','group_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('firestarter_thunder4_domain_group');
	}

}
