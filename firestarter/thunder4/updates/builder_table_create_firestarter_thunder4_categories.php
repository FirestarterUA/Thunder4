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
            $table->string('name')->nullable();
            $table->integer('domain_id');
            $table->integer('parent_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('firestarter_thunder4_categories');
    }
}
