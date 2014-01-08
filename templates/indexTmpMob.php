<div id="mobile_title">
    <? if (!empty($result)): ?>
    <div class="alert"><?=$result[0]?></div>
    <? endif ?>
    <?=$article->title?>
</div>
<div id="wide_top_ad">
    <? if ($show_ad): ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- imagerous_mobile_top -->
    <ins class="adsbygoogle"
        style="display:inline-block;width:320px;height:50px"
        data-ad-client="ca-pub-2363640980453937"
        data-ad-slot="4552913533"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
<? endif ?>
</div>
<div id="squares">
    <? for($i = 0; $i < count($article->pictures); $i++): ?>
    <a class="imager" style="display:none" href="picture.php?article=<?=$article->id?>&image=<?=$article->pictures[$i]->id?>&page=1">
        <div style="background-image: url(<?=$article->pictures[$i]->small?>);"></div>
    </a>
    <? endfor ?>
</div>
<a id="loadNext">
    <div id="loadNext" style="margin-bottom:10px">
        もっと見る
    </div>
</a>
<div id="wide_foot_ad">
<? if ($show_ad): ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- imagerous_mobile_mid -->
    <ins class="adsbygoogle"
        style="display:inline-block;width:320px;height:50px"
        data-ad-client="ca-pub-2363640980453937"
        data-ad-slot="8983113137"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
<? endif ?>
</div>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
