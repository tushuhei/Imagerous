<? if ($picture->id !== null): ?>
<div id="picContainer">
    <img id="mainPic" src="<?=$picture->url?>" onerror="document.getElementById('mainPic').src='<?=$picture->small?>'"
    title="<?=$picture->title?>" alt="<?=$picture->title?>">
    <div style="height:90px; padding-top:10px">
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-6865664974975544";
            /* imagerous-wide-picture */
            google_ad_slot = "8350949815";
            google_ad_width = 728;
            google_ad_height = 90;
            //--> </script>
        <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> </script>
    </div>
</div>
<div id="rightSidebar">
    <div style="margin:15px 0">
        <a class="btn btn-large" href="<?=$picture->url?>"
        onClick="_gaq.push(['_trackEvent','click-download-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-download"></i> ダウンロード 
        </a>
    </div>
    <div style="margin:15px 0">
        <a class="btn btn-large" href="/effect.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>"
        onClick="_gaq.push(['_trackEvent','click-play-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-edit"></i>&nbsp;&nbsp;&nbsp;写真で遊ぶ&nbsp;&nbsp
        </a>
    </div>
</div>
<? else: ?>
<span style="color:#fff"> 画像が見つかりませんでした </span>
<? endif ?>
