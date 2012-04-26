<? if ($picture->id !== null): ?>
<div style="width:780px">
    <img id="main_pic" src="<?=$picture->url?>" width="780" onerror="document.getElementById('main_pic').src='<?=$picture->small?>'"
    title="<?=$picture->title?>" alt="<?=$picture->title?>">
    <div style="height:90px; padding-top:10px">
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-6865664974975544";
            /* imagerous-wide-picture */
            google_ad_slot = "8350949815";
            google_ad_width = 728;
            google_ad_height = 90;
            //-->
        </script>
        <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
    </div>
</div>
<? else: ?>
<span style="color:#fff"> 画像が見つかりませんでした </span>
<? endif ?>
