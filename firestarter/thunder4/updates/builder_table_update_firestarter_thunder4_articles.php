<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4Articles extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_articles', function($table)
        {
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_articles', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->increments('id')->unsigned()->change();
        });
    }
}
