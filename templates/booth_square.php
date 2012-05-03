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
<div id="mobile_title" class="mobileOnly">
<?=$article->title?>
</div>
<div id="wide_top_ad">
    <script type="text/javascript">
        google_ad_client = "ca-pub-6865664974975544";
        if ((navigator.userAgent.indexOf('iPhone') > 0
            && navigator.userAgent.indexOf('iPad') == -1)
            || navigator.userAgent.indexOf('iPod') > 0
            || navigator.userAgent.indexOf('Android') > 0) {
            /* imagerous-mobile-top */
            google_ad_slot = "0785399817";
            google_ad_width = 320;
            google_ad_height = 50;
        } else {
            /* imagerous-wide-index */
            google_ad_slot = "7236739845";
            google_ad_width = 728;
            google_ad_height = 90;
        }
    </script>
    <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</div>
<div id="squares">
<? for($i = 0; $i < count($article->pictures); $i++): ?>
    <div class="pic_square">
        <a class="main_image" href="picture.php?article=<?=$article->id?>&image=<?=$article->pictures[$i]->id?>&page=1">
            <img class="main_image" src="<?=$article->pictures[$i]->small?>">
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
    <script type="text/javascript">
        google_ad_client = "ca-pub-6865664974975544";
        if ((navigator.userAgent.indexOf('iPhone') > 0
            && navigator.userAgent.indexOf('iPad') == -1)
            || navigator.userAgent.indexOf('iPod') > 0
            || navigator.userAgent.indexOf('Android') > 0) {
            /* imagerous-mobile-footer2 */
            google_ad_slot = "1018434635";
            google_ad_width = 320;
            google_ad_height = 50;
        } else {
            /* imagerous-footer */
            google_ad_slot = "3360904027";
            google_ad_width = 728;
            google_ad_height = 90;
        }
    </script>
</div>
<script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
