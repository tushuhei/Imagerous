<div style="width:780px; position:relative">
    <div>
        <img src="<?=$picture->url?>" style="width:780px" id="main_pic">
    </div>
    <div id="spContainer" style="position:absolute; top:0px; left:0px;border:solid black 1px; opacity: 0.8">
    </div>
</div>
<div style="margin:10px 0">
    <h3 style="color:#ddd; margin:10px 0">お手本</h3>
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
    <div style="color:#fff"> 上の画像をクリックしてみてください。右の「仕上げる」ボタンを押してみてください。</div>
    <h3 style="color:#ddd; margin:10px 0">わかりましたね？それではお楽しみください</h3>
</div>
<div style="width:180px; position:fixed; right:20px;top:50px; text-align:right">
    <div style="margin:5px">
        <a class="btn btn-large" href="javascript:changeOpacity()">
            <i id="changeOpacityBtn" class="icon-ok"></i>
            <span id="changeOpacityLbl"> 仕上げる </span>
        </a>
    </div>
</div>
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/wScratchPad.js"></script>
<script type="text/javascript">

    function changeOpacity () {
        var container = document.getElementById('spContainer');
        if (container.style.opacity < 0.9) {
            container.style.opacity = 1;
            document.getElementById('changeOpacityBtn').className = 'icon-edit';
            document.getElementById('changeOpacityLbl').innerText = '透過する';
        } else {
            container.style.opacity = 0.8;
            document.getElementById('changeOpacityBtn').className = 'icon-ok';
            document.getElementById('changeOpacityLbl').innerText = '仕上げる';
        }
    }

    var sp = null;

    $(function() {
        $(window).bind('load', function() {
            var picHeight = ($('#main_pic').height());
            sp = $("#spContainer").wScratchPad({
                image: null,
                width: 780,
                height: picHeight,
                size: 80,
                color: "FFCCCC"
            });
        });
    });

    function hoge () {
        console.log($('#mainCanvas').settings);
    }
</script>
