<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFirestarterThunder4Articles extends Migration 
{
	public function up()
	{
		Schema::create('firestarter_thunder4_articles', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('keyword')->nullable();
			$table->string('title')->nullable();
			$table->string('slug')->nullable();
			$table->text('description')->nullable();
			$table->text('body')->nullable();
			$table->integer('category_id')->default(1);
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
		Schema::dropIfExists('firestarter_thunder4_articles');
	}

}
