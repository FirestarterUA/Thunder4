<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Tasks4 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_tasks', function($table)
        {
            $table->smallInteger('is_console')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_tasks', function($table)
        {
            $table->dropColumn('is_console');
        });
    }
}
