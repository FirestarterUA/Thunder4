<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4DomainGroup extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_domain_group', function($table)
        {
            $table->integer('domain_id')->unsigned()->change();
            $table->integer('group_id')->unsigned()->change();
            $table->dropColumn('id');
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_domain_group', function($table)
        {
            $table->integer('domain_id')->unsigned(false)->change();
            $table->integer('group_id')->unsigned(false)->change();
            $table->increments('id')->unsigned();
        });
    }
}
