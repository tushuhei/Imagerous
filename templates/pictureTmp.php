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
<? if ($show_ad): ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- imagerous_picture_top -->
<ins class="adsbygoogle"
    style="display:inline-block;width:728px;height:90px"
    data-ad-client="ca-pub-2363640980453937"
    data-ad-slot="5750445133"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<? endif ?>
<div id="picContainer">
    <img id="mainPic" src="<?=$picture->url?>" onerror="document.getElementById('mainPic').src='<?=$picture->small?>';
    document.getElementById('playBtn').style.display = 'none'"
    title="<?=$picture->title?>" alt="<?=$picture->title?>">
    <div class="mobileOnly" style="margin-top:20px">
        <a href="index.php?id=<?=$picture->articleId?>" style="color:#ddd;font-size:21px;">&lt;&lt; 一覧へ戻る </a>
    </div>
    <a href="javascript:loadPic(1)"><div class="mobileOnly goNav" id="goNext">&gt;</div></a>
    <a href="javascript:loadPic(0)"><div class="mobileOnly goNav" id="goPrev">&lt;</div></a>
    <div style="height:90px; padding-top:10px">
<? if ($show_ad): ?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- imagerous_picture_bottom -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:728px;height:90px"
            data-ad-client="ca-pub-2363640980453937"
            data-ad-slot="7227178334"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
<? endif ?>
    </div>
</div>
<div id="rightSidebar">
    <div id="downloadBtn">
        <a id="downloadAnc" class="btn btn-large" href="<?=$picture->url?>"
            onClick="_gaq.push(['_trackEvent','click-download-button','<?=$picture->articleId?>','<?=$picture->id?>']);">
            <i class="icon-download-alt"></i> ダウンロード 
        </a>
    </div>
    <div id="playBtn">
        <a class="btn btn-large" href="/effect.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>"
            onClick="_gaq.push(['_trackEvent','click-play-button','<?=$picture->articleId?>','<?=$picture->id?>']);">
            <i class="icon-star"></i>&nbsp;&nbsp;&nbsp;写真で遊ぶ&nbsp;&nbsp
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
