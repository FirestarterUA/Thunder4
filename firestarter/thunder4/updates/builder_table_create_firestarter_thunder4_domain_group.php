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
            $table->increments('id');
            $table->integer('domain_id');
            $table->integer('group_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('firestarter_thunder4_domain_group');
    }
}
