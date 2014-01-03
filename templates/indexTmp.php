<? if (!empty($result)): ?>
<div class="alert"><?=$result[0]?></div>
<? endif ?>
<? if ($show_ad): ?>
<div id="wide_top_ad">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- top_index -->
<ins class="adsbygoogle"
style="display:inline-block;width:728px;height:90px"
data-ad-client="ca-pub-2363640980453937"
data-ad-slot="6426599532"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<? endif ?>
<div id="squares" class="clearfix">
<? for($i = 0; $i < count($article->pictures); $i++): ?>
    <a class="imager" style="display:none" href="picture.php?article=<?=$article->id?>&image=<?=$article->pictures[$i]->id?>&page=1">
        <div style="background-image: url(<?=$article->pictures[$i]->small?>);"></div>
    </a>
<? endfor ?>
</div>
<a id="loadNext"><div style="margin-top:50px;margin-bottom:10px"> もっと見る </div></a>
<? if ($show_ad): ?>
<div id="wide_foot_ad">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- bot_index -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2363640980453937"
     data-ad-slot="4810265535"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<? endif ?>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
