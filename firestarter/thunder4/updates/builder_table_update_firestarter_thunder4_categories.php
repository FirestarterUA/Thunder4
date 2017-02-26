<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Categories extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->integer('domain_id')->nullable()->change();
            $table->integer('parent_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->integer('domain_id')->nullable(false)->change();
            $table->integer('parent_id')->nullable(false)->change();
        });
    }
}
