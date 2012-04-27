<div style="width:780px; position:relative">
<img id="main_pic" src="<?=$picture->url?>" width="780" style="position:absolute; left:0px; top:0px">
<canvas id="c" style="position:absolute; left:0px; top:0px"></canvas>
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

$(function() {
    $(window).bind('load', function() {
        /* Canvas の生成 */
        var canvas = document.getElementById('c');
        canvas.addEventListener("mousemove", draw, true);
        canvas.addEventListener("mousedown", function(){  
            drawFlag = true;   
        }, false);    
        canvas.addEventListener("mouseup", function(){         
            drawFlag = false; 
        }, false);

        /* 画像を読み込む. Canvas のサイズを取るのに使用 */
        var mainPic = document.getElementById('main_pic');
        canvas.width = mainPic.width;
        canvas.height = mainPic.height;
        if ( ! canvas || ! canvas.getContext ) { return false; }

        /* コンテキストの生成 */
        var ctx = canvas.getContext('2d');

        /* Imageオブジェクトを生成 */
        var img = new Image();
        img.src = "<?=$picture->url?>";
        img.width = mainPic.width;
        img.height = mainPic.height;

        /* 画像が読み込まれるのを待ってから処理を続行 */
        img.onload = function() {
            ctx.drawImage(img, 0, 0, mainPic.naturalWidth, mainPic.naturalHeight, 0, 0, mainPic.width, mainPic.height);
            /* 長方形を描く */
            ctx.beginPath();
            ctx.fillStyle = "rgba(255, 192, 203, 0.8)";
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }
        function draw(e){     
            if (!drawFlag) return;
            var rect = event.target.getBoundingClientRect() ;
            var x = event.clientX - rect.left;
            var y = event.clientY - rect.top;
            ctx.globalAlpha = 0;
            ctx.beginPath();
            ctx.globalCompositeOperation = 'destination-out';
            ctx.strokeStyle = '#000000';
            ctx.lineWidth = brushSize;
            ctx.lineJoin= 'round';
            ctx.lineCap = 'round';
            ctx.shadowBlur = 0;
            ctx.setTransform(1, 0, 0, 1, 0, 0);
            ctx.moveTo(startX, startY);
            ctx.lineTo(endX, endY);
            ctx.stroke();
            ctx.closePath();
        }
    });

});
</script>
