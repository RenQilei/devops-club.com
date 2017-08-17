<footer>

    <div class="container">

        <div id="site-info">
            &copy;
            2016-{{ \Carbon\Carbon::now()->year }}
            <a href="{{ url('/') }}">DevOps-Club.com</a>
            <a href="http://www.miitbeian.gov.cn" target="_blank">苏ICP备16025223号-1</a>
        </div>

        <div id="site-contributor">
            Developed and Maintained by Qilei Ren with <i class="fa fa-heart"></i>
        </div>

        <div id="site-cc">
            若无特殊说明，本站原创内容默认均采用 <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">知识共享署名-非商业性使用-禁止演绎 4.0 国际许可协议</a>  进行许可。
        </div>

    </div>

</footer>

<script type="text/javascript">
    $(function() {
        if($("footer").offset().top < $(window).height() - $("footer").height()) {
            $("footer").css({'bottom': 0, 'position': 'fixed', 'width': '100%'});
        }
    });
</script>