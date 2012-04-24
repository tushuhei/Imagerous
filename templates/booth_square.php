<? if (!empty($result)): ?>
<div class="alert"><?=$result[0]?></div>
<? endif ?>
<? $adSpan = 13; ?>
<? $adDrop = rand(0, $adSpan); ?>
<? for($i = 0; $i < count($article->contents); $i++): ?>
<div style="float:left; width:200px; height:200px">
    <a class="main_image" href="picture.php?article=<?=$article->id?>&image=<?=$article->contents[$i]['id']?>">
        <img src="<?=$article->contents[$i]['image']?>" style="clip:rect(auto,200px,200px,auto); position:absolute;">
    </a>
</div>
<? if ($i % $adSpan == $adDrop): ?>
<div style="float:left; width:200px; height:200px">
    <script type="text/javascript"><!--
        google_ad_client = "ca-pub-6865664974975544";
        /* test */
        google_ad_slot = "9017745504";
        google_ad_width = 200;
        google_ad_height = 200;
        -->
    </script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</div>
<? endif ?>
<? endfor ?>
