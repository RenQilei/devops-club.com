<fieldset>

    <div class="pure-g">

        <div class="pure-u-4-5">

            {{-- 标题 --}}
            <label for="title">标题</label>
            <input name="title" id="title" type="text" value="{{ old('title') ? old('title') : (isset($article['title']) ? $article['title'] : '') }}" required autofocus>

            {{-- url --}}
            <label for="url">URL</label>
            <input name="url" id="url" type="text" value="{{ old('url') ? old('url') : (isset($article['url']) ? $article['url'] : '') }}">

            {{-- 正文 --}}
            <label for="content">正文</label>
            <textarea name="content" id="content-editor">{{ old('content') ? old('content') : (isset($article['content']) ? $article['content'] : '') }}</textarea>

            {{-- 标签 --}}
            <label for="tags">标签</label>
            <input name="tags" id="tags" value="{{ old('tags') ? old('tags') : (isset($article['tags_string']) ? $article['tags_string'] : '') }}">

            {{-- banner --}}
            <label for="banner">缩略横图</label>
            <div id="banner-upload-button">
                <span class="pure-button fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>图片上传</span>
                    <input id="banner-upload" type="file" name="banner">
                </span>
                <input type="text" name="banner_url" value="{{ old('banner_url') ? old('banner_url') : (isset($article['banner_url']) ? $article['banner_url'] : '') }}" hidden>
            </div>
            <div id="banner-upload-progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div>
            <div id="banner-upload-status">
                <span>(可选)点击上传banner图...</span>
            </div>
            <div id="banner-showroom">
                <div id="banner-uploaded-image"></div>
            </div>

        </div>

        <div class="pure-u-1-5">

            <div id="article-right">

                {{-- 类型 --}}
                {{-- 此处开发未完成。 --}}
                <label for="type">分类</label>
                <select name="type" id="type">
                    <option value="0">原创</option>
                    <option value="1">转载</option>
                    <option value="2">翻译</option>
                </select>

                {{-- 分类 --}}
                {{-- 此处开发未完成。 --}}
                <label for="category">分类</label>
                <select name="category" id="category">
                    <option value="">可选择一个分类</option>
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['display_name'] }}</option>
                    @endforeach
                </select>

                {{-- 发布时间 --}}
                <label for="published_at">发布时间</label>
                <input type="text" name="published_at" class="auto-kal" data-kal="format:'YYYY-MM-DD',selected:'{{ old('published_at') ? old('published_at') : (isset($article['published_at']) ? $article['published_at'] : (\Carbon\Carbon::now()->year."-".\Carbon\Carbon::now()->month."-".\Carbon\Carbon::now()->day)) }}'">

                <div id="publish-button">
                    {{-- 立即发布 --}}
                    <button name="status" value="is_publishing" class="pure-button pure-button-primary">立即发布</button>

                    {{-- 存为草稿 --}}
                    <button name="status" value="is_draft" class="pure-button">存为草稿</button>
                </div>

            </div>

        </div>

    </div>

</fieldset>