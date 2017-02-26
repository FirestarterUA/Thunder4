<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Categories2 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->integer('domain_id')->nullable(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_categories', function($table)
        {
            $table->integer('domain_id')->nullable()->change();
        });
    }
}
