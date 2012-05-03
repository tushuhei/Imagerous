<? if ($picture->id !== null): ?>
<div id="picContainer">
    <img id="mainPic" src="<?=$picture->url?>" onerror="document.getElementById('mainPic').src='<?=$picture->small?>'"
    title="<?=$picture->title?>" alt="<?=$picture->title?>">
    <div class="mobileOnly" style="margin-top:20px">
        <a href="index.php?id=<?=$picture->articleId?>" style="color:#ddd;font-size:21px;">&lt;&lt; 戻る </a>
    </div>
    <a href="javascript:loadPic(1)"><div class="mobileOnly goNav" id="goNext">&gt;</div></a>
    <a href="javascript:loadPic(0)"><div class="mobileOnly goNav" id="goPrev">&lt;</div></a>
    <div style="height:90px; padding-top:10px">
        <script type="text/javascript">
            google_ad_client = "ca-pub-6865664974975544";
            if ((navigator.userAgent.indexOf('iPhone') > 0
                && navigator.userAgent.indexOf('iPad') == -1)
                || navigator.userAgent.indexOf('iPod') > 0
                || navigator.userAgent.indexOf('Android') > 0) {
                /* imagerous-mobile-footer-picture */
                google_ad_slot = "3683174449";
                google_ad_width = 320;
                google_ad_height = 50;
            } else {
                /* imagerous-wide-picture */
                google_ad_slot = "8350949815";
                google_ad_width = 728;
                google_ad_height = 90;
            }
        </script>
        <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> </script>
    </div>
</div>
<div id="rightSidebar">
    <div id="downloadBtn">
        <a id="downloadAnc" class="btn btn-large" href="<?=$picture->url?>"
        onClick="_gaq.push(['_trackEvent','click-download-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-download"></i> ダウンロード 
        </a>
    </div>
    <div style="margin:15px 0" id="playBtn">
        <a class="btn btn-large" href="/effect.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>"
        onClick="_gaq.push(['_trackEvent','click-play-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-edit"></i>&nbsp;&nbsp;&nbsp;写真で遊ぶ&nbsp;&nbsp
        </a>
    </div>
</div>
<? else: ?>
<span style="color:#fff"> 画像が見つかりませんでした </span>
<? endif ?>
<div style="display:none" id="articleId"><?=$picture->articleId?></div>
<div style="display:none" id="pictureId"><?=$picture->id?></div>
<div style="display:none" id="pageNum"><?=$pageNum?></div>
<script type="text/javascript" src="/js/picture.js"></script>
