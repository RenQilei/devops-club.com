<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request)
    {
        $currentPage = 1;
        if ($request->page) {
            $currentPage = $request->page;
        }

        $limit = 20;
        $offset = ($currentPage - 1) * $limit;

        // 非删除、非草稿的文章
        $articles = object2Array(DB::table('articles')->where('is_draft', false)->orderBy('published_at', 'desc')->orderBy('id', 'desc')->offset($offset)->limit($limit)->get());

        // 处理作者、分类、标签
        foreach ($articles as $i => $article) {
            $articles[$i] = ArticleController::refine($article);
        }

        $articleCount = DB::table('articles')->count();
        $totalPageCount = ($articleCount % $limit) ? ($articleCount / $limit + 1) : ($articleCount / $limit);

        return view("index", compact('articles', 'totalPageCount', 'currentPage'));
    }

}
