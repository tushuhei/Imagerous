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
<div id="picContainer" style="padding-top: 50px">
    <div>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- imagerous_mobile_picture_top -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:320px;height:50px"
            data-ad-client="ca-pub-2363640980453937"
            data-ad-slot="1180644734"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div>
        <img id="mainPic" src="<?=$picture->url?>" onerror="document.getElementById('mainPic').src='<?=$picture->small?>';"
        title="<?=$picture->title?>" alt="<?=$picture->title?>">
    </div>
    <div style="text-align:center; margin-top:5px;">
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- imagerous_mobile_picture_middle -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:320px;height:50px"
            data-ad-client="ca-pub-2363640980453937"
            data-ad-slot="4134111135"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
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
