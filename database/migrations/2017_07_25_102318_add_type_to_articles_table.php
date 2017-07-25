<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 文章类型：type
        // 0 -- 原创
        // 1 -- 转载
        // 2 -- 翻译
        if (Schema::hasTable('articles') && !Schema::hasColumn('articles', 'type')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->integer('type')->unsigned()->default(0);
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
        if (Schema::hasTable('articles') && Schema::hasColumn('articles', 'type')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropColumn('type');
            });
        }
    }
}
