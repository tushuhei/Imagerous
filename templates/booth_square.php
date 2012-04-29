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
        <form id="pictureForm1_<?=$i?>" method="get" action="picture.php">
            <a class="main_image" href="javascript:document.getElementById('pictureForm1_<?=$i?>').submit()">
                <img src="<?=$article->pictures[$i]->small?>" style="clip:rect(auto, 200px, 200px, auto); position:absolute;">
                <input type="hidden" name="article" value="<?=$article->id?>">
                <input type="hidden" name="image" value="<?=$article->pictures[$i]->id?>">
                <input type="hidden" name="page" value="1">
            </a>
        </form>
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
