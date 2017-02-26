<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Tasks3 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_tasks', function($table)
        {
            $table->dropColumn('params');
            $table->dropColumn('internal');
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_tasks', function($table)
        {
            $table->string('params', 255);
            $table->string('internal', 255);
        });
    }
}
