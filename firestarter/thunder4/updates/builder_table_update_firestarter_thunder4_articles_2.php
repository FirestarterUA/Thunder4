<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Articles2 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_articles', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_articles', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
