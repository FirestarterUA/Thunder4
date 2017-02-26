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
            $table->string('keyword');
            $table->string('title');
            $table->text('description');
            $table->text('body');
            $table->integer('category_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('firestarter_thunder4_articles');
    }
}
