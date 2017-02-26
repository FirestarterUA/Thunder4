<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Groups3 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_groups', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_groups', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
}
