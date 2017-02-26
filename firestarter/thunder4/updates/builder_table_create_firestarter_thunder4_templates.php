<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFirestarterThunder4Templates extends Migration
{
    public function up()
    {
        Schema::create('firestarter_thunder4_templates', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('template');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('firestarter_thunder4_templates');
    }
}
