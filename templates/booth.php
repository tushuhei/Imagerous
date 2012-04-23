<? if (!empty($result)): ?>
<div class="alert"><?=$result[0]?></div>
<? endif ?>
<? for($i = 0; $i < count($article->contents); $i++): ?>
<a class="main_image" href="picture.php?article=<?=$article->id?>&image=<?=$article->contents[$i]['id']?>">
    <img src="<?=$article->contents[$i]['image']?>" style="vertical-align:top">
</a>
<? if ($i % 11 == 10): ?>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6865664974975544";
/* imagerous-picture */
google_ad_slot = "2086038225";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<? endif ?>
<? endfor ?>
