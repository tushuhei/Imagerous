<div style="visibility:hidden; height:0px;">
<!-- google_ad_section_start -->
壁紙をまとめる、眺める、つかう。新しいイメージキュレーションサービスです。
<?=$article->title?>
<? foreach($article->wdata as $data): ?>
<?=$data->title?>
<?=$data->description?>
<? endforeach ?>
<!-- google_ad_section_end -->
</div>
<? if ($picture->id !== null): ?>
<div id="picContainer">
    <script type="text/javascript"><!--
    google_ad_client = "ca-pub-6865664974975544";
    /* imagerous-mobile-picture-top */
    google_ad_slot = "4573877363";
    google_ad_width = 320;
    google_ad_height = 50;
    //-->
    </script>
    <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
    <div>
        <img id="mainPic" src="<?=$picture->url?>" onerror="document.getElementById('mainPic').src='<?=$picture->small?>';"
    title="<?=$picture->title?>" alt="<?=$picture->title?>">
    </div>
    <div style="text-align:center">
        <a id="goPrev" class="btn btn-large goNav" href="javascript:loadPic(0)"
        onClick="_gaq.push(['_trackEvent','click-prev-mobile-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-backward"></i>戻る
        </a>
&nbsp;
        <a id="downloadAnc" class="btn btn-large" href="index.php?id=<?=$picture->articleId?>"
        onClick="_gaq.push(['_trackEvent','click-list-mobile-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-eject"></i>画像一覧へ
        </a>
&nbsp;
        <a id="goNext" class="btn btn-large goNav" href="javascript:loadPic(1)"
        onClick="_gaq.push(['_trackEvent','click-next-mobile-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-forward"></i>次へ
        </a>
    </div>
    <div style="height:90px; padding-top:10px">
        <script type="text/javascript">
            google_ad_client = "ca-pub-6865664974975544";
            /* imagerous-mobile-footer-picture */
            google_ad_slot = "3683174449";
            google_ad_width = 320;
            google_ad_height = 50;
        </script>
        <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> </script>
    </div>
</div>
<div id="rightSidebar">
    <div id="downloadBtn">
        <a id="downloadAnc" class="btn btn-large" href="<?=$picture->url?>"
        onClick="_gaq.push(['_trackEvent','click-download-button',<?=$picture->articleId?>,<?=$picture->id?>]);">
            <i class="icon-download-alt"></i> ダウンロード 
        </a>
    </div>
</div>
<? else: ?>
<span style="color:#fff"> 画像が見つかりませんでした </span>
<? endif ?>
<div style="display:none" id="articleId"><?=$picture->articleId?></div>
<div style="display:none" id="pictureId"><?=$picture->id?></div>
<div style="display:none" id="pageNum"><?=$page?></div>
<script type="text/javascript" src="/js/picture.js"></script>
