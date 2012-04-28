<script type="text/javascript" src="/js/index.js"></script>
<? if (!empty($result)): ?>
<div class="alert"><?=$result[0]?></div>
<? endif ?>
<div style="height:90px; padding-bottom:10px">
    <script type="text/javascript"><!--
        google_ad_client = "ca-pub-6865664974975544";
        /* imagerous-wide-index */
        google_ad_slot = "7236739845";
        google_ad_width = 728;
        google_ad_height = 90;
        //-->
    </script>
    <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</div>
<div id="squares">
<? for($i = 0; $i < count($article->pictures); $i++): ?>
<div style="float:left; width:200px; height:200px">
    <a class="main_image" href="picture.php?article=<?=$article->id?>&image=<?=$article->pictures[$i]->id?>">
        <img src="<?=$article->pictures[$i]->small?>" style="clip:rect(auto, 200px, 200px, auto); position:absolute;">
    </a>
</div>
<? endfor ?>
</div>
<a id="loadNext">
<div id="loadNext" style="margin-bottom:10px">
もっと見る
</div>
</a>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6865664974975544";
/* imagerous-footer */
google_ad_slot = "3360904027";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
