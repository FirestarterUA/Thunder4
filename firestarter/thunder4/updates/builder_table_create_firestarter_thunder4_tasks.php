<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFirestarterThunder4Tasks extends Migration
{
    public function up()
    {
        Schema::create('firestarter_thunder4_tasks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('command');
            $table->string('cron');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('firestarter_thunder4_tasks');
    }
}
