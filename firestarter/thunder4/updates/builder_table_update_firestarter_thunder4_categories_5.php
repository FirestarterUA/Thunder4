<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Categories5 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
