<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Tasks extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_tasks', function($table)
        {
            $table->string('params');
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_tasks', function($table)
        {
            $table->dropColumn('params');
        });
    }
}
