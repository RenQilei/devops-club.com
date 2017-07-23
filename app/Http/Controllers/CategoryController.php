<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        // $category 为 name，获得对应 id
        $category = Category::where('name', $category)->first();

        if ($category) {
            $articles = $category->articles->toArray();

            foreach($articles as $i => $article) {
                $articles[$i] = ArticleController::refine($article);
            }
        }

        $categories = Category::all()->toArray();

        return view("categories.show", compact('category', 'articles', 'categories'));

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

    public function addOriginalCategories()
    {
        // 添加分类：
        // 人工智能、大数据、云计算、前端开发、编程语言、数据库、系统运维、测试、网络、物联网、软件工程、综合

        if (!Category::where('name', 'ai')->first()) {
            Category::create([
                'display_name'  => '人工智能',
                'name'          => 'ai',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'big_data')->first()) {
            Category::create([
                'display_name'  => '大数据',
                'name'          => 'big_data',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'cloud')->first()) {
            Category::create([
                'display_name'  => '云计算',
                'name'          => 'cloud',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'ui')->first()) {
            Category::create([
                'display_name'  => '前端开发',
                'name'          => 'ui',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'programming_language')->first()) {
            Category::create([
                'display_name'  => '编程语言',
                'name'          => 'programming_language',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'database')->first()) {
            Category::create([
                'display_name'  => '数据库',
                'name'          => 'database',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'system_operation')->first()) {
            Category::create([
                'display_name'  => '系统运维',
                'name'          => 'system_operation',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'test')->first()) {
            Category::create([
                'display_name'  => '测试',
                'name'          => 'test',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'network')->first()) {
            Category::create([
                'display_name'  => '网络',
                'name'          => 'network',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'iot')->first()) {
            Category::create([
                'display_name'  => '物联网',
                'name'          => 'iot',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'software_engineering')->first()) {
            Category::create([
                'display_name'  => '软件工程',
                'name'          => 'software_engineering',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        if (!Category::where('name', 'general')->first()) {
            Category::create([
                'display_name'  => '综合',
                'name'          => 'general',
                'description'   => '',
                'banner_url'    => '',
                'weight'        => 0,
            ]);
        }

        return "原始分类创建成功！";
    }
}
