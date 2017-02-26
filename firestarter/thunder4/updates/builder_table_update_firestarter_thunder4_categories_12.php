<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Categories12 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->integer('parent_id')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->integer('parent_id')->default(null)->change();
        });
    }
}
