<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSourceRelatedAttributesToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('articles')
            && !Schema::hasColumn('articles', 'source_title')
            && !Schema::hasColumn('articles', 'source_writer')
            && !Schema::hasColumn('articles', 'source_link')) {

            Schema::table('articles', function (Blueprint $table) {
                $table->string('source_title')->nullable();
                $table->string('source_writer')->nullable();
                $table->string('source_link')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('articles')
            && Schema::hasColumn('articles', 'source_title')
            && Schema::hasColumn('articles', 'source_writer')
            && Schema::hasColumn('articles', 'source_link')) {

            Schema::table('articles', function (Blueprint $table) {
                $table->dropColumn('source_title');
                $table->dropColumn('source_writer');
                $table->dropColumn('source_link');
            });
        }
    }
}
