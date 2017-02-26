<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Domains3 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_domains', function($table)
        {
            $table->string('theme');
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_domains', function($table)
        {
            $table->dropColumn('theme');
        });
    }
}
