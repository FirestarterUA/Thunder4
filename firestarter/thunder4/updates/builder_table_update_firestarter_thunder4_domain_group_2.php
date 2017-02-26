<?php namespace Firestarter\Thunder4\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFirestarterThunder4DomainGroup2 extends Migration
{
    public function up()
    {
        Schema::table('firestarter_thunder4_domain_group', function($table)
        {
            $table->integer('domain_id')->unsigned(false)->change();
            $table->integer('group_id')->unsigned(false)->change();
            $table->primary(['domain_id','group_id']);
        });
    }
    
    public function down()
    {
        Schema::table('firestarter_thunder4_domain_group', function($table)
        {
            $table->dropPrimary(['domain_id','group_id']);
            $table->integer('domain_id')->unsigned()->change();
            $table->integer('group_id')->unsigned()->change();
        });
    }
}
