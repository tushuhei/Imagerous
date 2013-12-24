<? if (!empty($result)): ?>
<div class="alert"><?=$result[0]?></div>
<? endif ?>
<div id="wide_top_ad">
<? if ($show_ad): ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- top_index -->
<ins class="adsbygoogle"
style="display:inline-block;width:728px;height:90px"
data-ad-client="ca-pub-2363640980453937"
data-ad-slot="6426599532"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<? endif ?>
<div id="squares">
<? for($i = 0; $i < count($article->pictures); $i++): ?>
    <div class="pic_square">
        <a class="main_image" href="picture.php?article=<?=$article->id?>&image=<?=$article->pictures[$i]->id?>&page=1">
            <img src="<?=$article->pictures[$i]->small?>">
        </a>
    </div>
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
<!-- bot_index -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2363640980453937"
     data-ad-slot="4810265535"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<? endif ?>
</div>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
