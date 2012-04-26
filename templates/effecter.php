<div style="width:780px; position:relative">
    <div>
        <img src="<?=$picture->url?>" style="width:780px" id="main_pic">
    </div>
    <div id="spContainer" style="position:absolute; top:0px; left:0px;border:solid black 1px; opacity: 0.8">
    </div>
</div>
<div style="margin:10px 0">
    <h3 style="color:#ddd; margin:10px 0">これはなんですか？</h3>
    <span style="color:#fff"> ところで、こういう画像があるのをご存知ですか？</span>
    <a href="http://matome.naver.jp/odai/2130018442449290201" target="_blank">
        <div class="side_feed clearfix">
            <div style="float:left; width:60px; text-align:center">
                <img src="http://tc1.search.naver.jp/?/kaze/mission/USER/1/8/169368/22279/438x438x47c5aea94e73b6527d0b7ee5.jpg/c.95x95" width="50">
            </div>
            <div style="float:left;margin-left:5px;height:50px; width:710px">
                AKB48を「裸に見える画像ジェネレーター」で丸裸にしてみた
            </div>
        </div>
    </a>
    <div style="color:#fff"> では、上の画像をクリックしてみてください。そして、右の「仕上げる」ボタンを押してみてください。</div>
    <h3 style="color:#ddd; margin:10px 0">わかりましたね？それではお楽しみください</h3>
</div>
<div style="width:350px; position:fixed; right:20px;top:50px;">
    <div style="margin:5px">
        <a class="btn" href="javascript:document.getElementById('spContainer').style.opacity=1"><i class="icon-ok"></i> 仕上げる </a>
    </div>
    <div style="margin:5px">
        <a class="btn" href="javascript:document.getElementById('spContainer').style.opacity=0.8"><i class="icon-ok"></i> もう一回 </a>
    </div>
</div>
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/wScratchPad.js"></script>
<script type="text/javascript">
    $(function() {
            $(window).bind('load', function() {
                var picHeight = ($('#main_pic').height());
                var sp =$("#spContainer").wScratchPad();
                sp.wScratchPad("image", null);
                sp.wScratchPad("width", 780);
                sp.wScratchPad("height", picHeight);
                sp.wScratchPad("size", 100);
                sp.wScratchPad("color", "FFCCCC");
                sp.wScratchPad("reset");
                });
            });
</script>
