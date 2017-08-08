<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 请求标签的全部文章列表展示页
     *
     * @param $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($tag)
    {
        // $tag 为 name，获得对应 id
        $tag = Tag::where('name', $tag)->first();

        if ($tag) {
            $articles = $tag->articles->toArray();

            foreach($articles as $i => $article) {
                $articles[$i] = ArticleController::refine($article);
            }
        }

        // 使用最多的前二十个标签，相同数量时，较新的优先
        $tags = Tag::all()->sortByDesc('article_count')->take(20);

        $pageTitle = "标签: ".$tag['name'];

        return view("tags.show", compact('tag', 'articles', 'tags', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
