<div style="width:780px; position:relative">
    <div>
        <img src="<?=$picture->url?>" style="width:780px" id="mainPic">
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
    <canvas id="subCanvas"></canvas>
    <img id="subPic">
</div>
<div style="width:170px; position:fixed; right:20px;top:50px; text-align:right">
    <div style="margin:5px">
        <a class="btn btn-large" href="javascript:changeOpacity()">
            <i id="changeOpacityBtn" class="icon-ok"></i>
            <span id="changeOpacityLbl"> 仕上げる </span>
        </a>
    </div>
    <div style="margin-top:30px; color:#ddd">
        <div style="text-align:right; font-size:18px; margin-bottom:10px">
            ブラシサイズ
        </div>
        <? $brashSizes = array(20,40,80); ?>
        <? foreach ($brashSizes as $brashSize): ?>
        <a class="brashCircle">
            <div style="
                clear:right;
                margin:5px;
                float:right;
                width:<?=$brashSize?>px; 
                height:<?=$brashSize?>px; 
                -webkit-border-radius:<?=($brashSize/2)?>px; 
                -moz-border-radius:<?=($brashSize/2)?>px;
                border:1px solid #fff;
                background-color: #bbb;
                " class="brashCircle"
                id="brashCircle<?=$brashSize?>"></div>
        </a>
        <? endforeach ?>
    </div>
</div>
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/wScratchPad.js"></script>
<script type="text/javascript">

    var sp = null;
    var mainPic = document.getElementById('mainPic');
    var brashCircles = new Array();
    <? for($i = 0; $i < count($brashSizes); $i++): ?>
        <? if ($i == count($brashSizes) - 1): ?>
            brashCircles.push(new BrashCircle(document.getElementById("brashCircle<?=$brashSizes[$i]?>"), <?=$brashSizes[$i]?>, true));
        <? else: ?>
            brashCircles.push(new BrashCircle(document.getElementById("brashCircle<?=$brashSizes[$i]?>"), <?=$brashSizes[$i]?>, false));
        <? endif ?>
    <? endfor ?>

    $(function() {
        $(window).bind('load', function() {
            sp = $("#spContainer").wScratchPad({
                width: mainPic.width,
                height: mainPic.height,
                size: 80,
                color: "FFCCCC"
            });
        });
    });

    function changeBrashSize(size) {
        sp.wScratchPad("size", size);
        for (var i = 0; i < brashSizes.length; i++) {
            document.getElementById('brashCircle' + brashSizes[i]).style.backgroundColor = "#bbb";
        }
        document.getElementById('brashCircle'+size).style.backgroundColor = "#0085cc";
    }

    function BrashCircle(el, size, active) {
        var circle = this;
        circle.el = el;
        circle.size = size;
        circle.active = active;
        if (circle.active == true) {
            circle.el.style.backgroundColor = "#0085cc";
        }
        $(circle.el).live("click", function (){
                sp.wScratchPad("size", circle.size);
                for (var i = 0; i < brashCircles.length; i++) {
                    brashCircles[i].setNotActive();
                }
                circle.setActive();
                });
        $(circle.el).live("mouseover", function (){
                if (circle.active == false) {
                    circle.el.style.backgroundColor = "#fff";
                }
                });
        $(circle.el).live("mouseout", function (){
                if (circle.active == false) {
                    circle.el.style.backgroundColor = "#bbb";
                }
                });
        $(circle.el).live("mousedown", function (){
                if (circle.active == false) {
                    circle.el.style.backgroundColor = "#999";
                }
                });
    }
    BrashCircle.prototype.setNotActive = function () {
        var circle = this;
        circle.el.style.backgroundColor = "#bbb";
        circle.active = false;
    };
    BrashCircle.prototype.setActive = function () {
        var circle = this;
        circle.el.style.backgroundColor = "#0085cc";
        circle.active = true;
    };

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

</script>
