<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Templates extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_templates', function($table)
        {
            $table->string('title_template');
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_templates', function($table)
        {
            $table->dropColumn('title_template');
        });
    }
}
