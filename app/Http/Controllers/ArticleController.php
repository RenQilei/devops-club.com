<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

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
        $categories = Category::all()->toArray();

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        // 获取全部请求数据
        $article = $request->all();

        // 创建一个 uuid
        $uuid = Uuid::generate(3, $article['title'].Carbon::now()->serialize().str_random(10), Uuid::NS_DNS);
        if (Article::withTrashed()->where('uuid', $uuid)->count()) {
            // uuid 已存在
            dd("uuid 冲突，请确认");
        }

        // 处理数据中的图片，将其全部转移至 /storage/app/public/images 中
        // 转移完成后替换原内容中的路径值

        // banner
        $newBannerUrl = $article['banner_url'] ? $this->moveTempImageToPermanent($article['banner_url']) : '';

        // 文章正文
        $content = $article['content'];
        $pattern = "/<img src=\"([\S]*?)\" alt=\"[\S]*\" style=\"[\S]*\">/";
        preg_match_all($pattern, $content, $matches);
        foreach ($matches[1] as $image) {
            $newImageUrl = $image ? $this->moveTempImageToPermanent($image) : '';
            $content = str_replace($image, $newImageUrl, $content);
        }

        // 发布时间
        $published_at = Carbon::createFromFormat('Y-m-d', $article['published_at']);
        $published_at = $published_at->isToday() ? $published_at : Carbon::createFromFormat('Y-m-d H', $article['published_at'].' 00');

        // 构造新文章数组
        $newArticle = [
            'title'         => $article['title'],
            'content'       => $content,
            'uuid'          => $uuid,
            'url'           => $article['url'],
            'user_id'       => Auth::id(),
            'category_id'   => empty($article['category']) ? 0 : $article['category'],
            'published_at'  => $published_at,
            'banner_url'    => $newBannerUrl,
            'is_draft'      => $article['status'] == 'is_draft' ? true : false,
        ];

        // 存入数据库
        $newArticle = Article::create($newArticle);

        // 处理标签
        $tags = explode(',', $article['tags']);
        foreach ($tags as $tag) {
            // 判断是否为空字段，如果为空则不处理
            if ($tag) {
                // 检查标签是否存在
                $existedTag = Tag::where('name', $tag)->get()->first();
                if ($existedTag) {
                    // 存在，直接与新建文章进行关联
                    $newArticle->tags()->attach($existedTag['id']);
                }
                else {
                    // 不存在，创建新的标签并关联
                    $newTag = Tag::create(['name' => $tag]);
                    $newArticle->tags()->attach($newTag->id);
                }
            }
        }

        // 如果存入数据库失败

        // 跳转至文章展示页
        return redirect('article/'.($newArticle['url'] ? $newArticle['url'] : $newArticle['uuid']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        // $article 可能为 uuid 或 url
        // 不支持通过 id 直接查看文章

        $articleId = $this->getArticleId($article);

        if ($articleId) {
            // 阅读量加1
            $article = Article::find($articleId);
            $article->page_view += 1;
            $article->save();

            $article = self::refine($article->toArray());
        }
        else {
            dd("文章不存在");
        }

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        $articleId = $this->getArticleId($article);

        if ($articleId) {
            $article = self::refine(Article::find($articleId)->toArray());
        }
        else {
            dd("文章不存在");
        }

        $categories = Category::all()->toArray();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $article)
    {
        $articleId = $this->getArticleId($article);

        // 旧文章
        $oldArticle = Article::find($articleId)->toArray();

        // 获取旧文章正文图片信息
        $pattern = "/<img src=\"([\S]*?)\" alt=\"[\S]*\" style=\"[\S]*\">/";
        preg_match_all($pattern, $oldArticle['content'], $matches);
        $oldArticleContentImages = $matches[1];
        $oldArticleBannerImage = $oldArticle['banner_url'];

        // 获取全部请求数据
        $article = $request->all();

        // 处理数据中的图片，将其全部转移至 /storage/app/public/images 中
        // 转移完成后替换原内容中的路径值

        // banner
        $newBannerUrl = $article['banner_url'] ? $this->moveTempImageToPermanent($article['banner_url']) : '';

        // 文章正文
        $content = $article['content'];
        $pattern = "/<img src=\"([\S]*?)\" alt=\"[\S]*\" style=\"[\S]*\">/";
        preg_match_all($pattern, $content, $matches);
        foreach ($matches[1] as $image) {
            $newImageUrl = $image ? $this->moveTempImageToPermanent($image) : '';
            $content = str_replace($image, $newImageUrl, $content);
        }

        // 发布时间
        $published_at = Carbon::createFromFormat('Y-m-d', $article['published_at']);
        $published_at = $published_at->isToday() ? $published_at : Carbon::createFromFormat('Y-m-d H', $article['published_at'].' 00');

        // 构造新文章数组
        $newArticle = [
            'title'         => $article['title'],
            'content'       => $content,
            'uuid'          => $oldArticle['uuid'],
            'url'           => $article['url'],
            'user_id'       => Auth::id(),
            'category_id'   => empty($article['category']) ? 0 : $article['category'],
            'published_at'  => $published_at,
            'banner_url'    => $newBannerUrl,
            'is_draft'      => $article['status'] == 'is_draft' ? true : false,
        ];

        // 更新数据库
        Article::where('id', $articleId)->update($newArticle);

        // 更新标签
        $tags = explode(',', $article['tags']);
        $syncTagIds = [];
        foreach ($tags as $tag) {
            // 判断是否为空字段，如果为空则不处理
            if ($tag) {
                // 检查标签是否存在
                $existedTag = Tag::where('name', $tag)->get()->first();
                if ($existedTag) {
                    array_push($syncTagIds, $existedTag['id']);
                }
                else {
                    // 不存在，创建新的标签并关联
                    $newTag = Tag::create(['name' => $tag]);
                    array_push($syncTagIds, $newTag['id']);
                }
            }
        }
        Article::find($articleId)->tags()->sync($syncTagIds);

        // 如果存入数据库失败

        // 跳转至文章展示页
        return redirect('article/'.($newArticle['url'] ? $newArticle['url'] : $newArticle['uuid']));
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

    public function wangImageUpload(Request $request)
    {
        // wangEditor 上传的图片全部存储于临时文件目录 /storage/app/public/temp
        // 正式提交后需要将图片转移至 /storage/app/public/images
        if ($request->hasFile("wangEditorH5File")) {

            $imageUrl = Storage::putFile('temp', $request->file('wangEditorH5File'));

            return Storage::url($imageUrl);
        }
    }

    public function bannerImageUpload(Request $request)
    {
        // 存至 /public/temp 目录下,当文章确认发布时再一并迁移至 /public/images
        // banner
        if ($request->hasFile("banner")) {

            $imageUrl = Storage::putFile('temp', $request->file('banner'));

            return json_encode(Storage::url($imageUrl));
        }
    }

    private function moveTempImageToPermanent($image)
    {
        // $image 为图片临时路径
        // 检查临时图片是否存在
        // 如存在则将其转移至 /public/images 目录中
        // 完成后返回新的图片路径

        // 检查是否已经在 /public/images 中，在则直接返回
        $imagePathArray = explode('/', $image);

        if (($imagePathArray[1] == 'storage') && ($imagePathArray[2] == 'images')) {
            return $image;
        }

        $imageName = $imagePathArray[3];
        if (Storage::exists('temp/'.$imageName)) {

            // 生成新的图片名
            $newImageName = str_replace(['-', ':', ' '], "", Carbon::now())."_".md5(uniqid().explode('.', $imageName)[0]).".".explode('.', $imageName)[1];
            // 图片转存
            Storage::move('temp/'.$imageName, 'images/'.$newImageName);

            return Storage::url('images/'.$newImageName);
        }
    }

    private function getArticleId($article)
    {
        // 检查是否为 uuid
        $count = preg_match('/^\w{8}-\w{4}-\w{4}-\w{4}-\w{12}$/', $article);
        if ($count) {
            // uuid
            return Article::where('uuid', $article)->first()->id;
        }
        else {
            // 检查是否为 url
            return Article::where('url', $article)->first()->id;
        }

        // 不匹配
        return 0;
    }

    /**
     * 优化文章查询结果，增加用户（User）、分类（Category）和标签（Tag）信息
     *
     * @param $article
     * @return mixed
     */
    public static function refine($article)
    {
        // $articles[$i]['user_name'] 为用户名
        $article['user_name'] = User::find($article['user_id'])->name;
        // $articles[$i]['category'] 为分类信息
        $article['category'] = $article['category_id'] ? Category::find($article['category_id'])->toArray() : null;
        // 获取文章标签数组
        $article['tags'] = Article::find($article['id'])->tags->toArray();
        // 生成","分隔的标签字符串
        $article['tags_string'] = '';
        foreach ($article['tags'] as $tag) {
            $article['tags_string'] .= empty($article['tags_string']) ? $tag['name'] : ",".$tag['name'];
        }

        return $article;
    }
}
