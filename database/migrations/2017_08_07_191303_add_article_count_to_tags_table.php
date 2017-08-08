<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticleCountToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tags')) {

            Schema::table('tags', function (Blueprint $table) {
                $table->integer('article_count')->unsigned()->default(0);
            });
        }

        // 已经存在的标签进行统计和更新
        foreach (Tag::all() as $tag) {
            $updatingTag = Tag::find($tag->id);
            $updatingTag->article_count = $tag->articles()->count();
            $updatingTag->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('tags')) {

            Schema::table('tags', function (Blueprint $table) {
                $table->dropColumn('article_count');
            });
        }
    }
}
