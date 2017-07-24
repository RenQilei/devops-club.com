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

    </div>

</footer>

<script type="text/javascript">
    $(function() {
        if($("footer").offset().top < $(window).height() - $("footer").height()) {
            $("footer").css({'bottom': 0, 'position': 'fixed', 'width': '100%'});
        }
    });
</script>