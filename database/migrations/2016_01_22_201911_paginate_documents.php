<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaginateDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doc_contents', function(Blueprint $table)
        {
          $table->mediumtext('content')->change();
          $table->integer('page')->default(1);
          $table->index('page');
        });

        Schema::table('annotations', function(Blueprint $table)
        {
          $table->integer('page')->default(1);
          $table->index('page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doc_contents', function(Blueprint $table)
        {
            $table->dropIndex('doc_contents_page_index');
            $table->dropColumn('page');
            $table->text('content')->change();
        });

        Schema::table('annotations', function(Blueprint $table)
        {
            $table->dropIndex('annotations_page_index');
            $table->dropColumn('page');
        });
    }
}
