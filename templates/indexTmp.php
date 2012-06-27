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
<div id="wide_top_ad">
<script type="text/javascript"><!--
in_uid = '275098';
in_templateid = '15033';
in_charset = 'UTF-8';
in_group = 'DefaultGroup';
in_matchurl = '';
in_HBgColor = '222222';
in_HBorderColor = '222222';
in_HTitleColor = 'EEEEEE';
in_HTextColor = 'CCCCCC';
in_HUrlColor = 'CCCCCC';
frame_width = '728';
frame_height = '90';
--></script>
<script type='text/javascript' src='http://cache.microad.jp/send0100.js'></script>
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
        google_ad_client = "ca-pub-8950789672544776";
        /* imagerous-index-footer */
        google_ad_slot = "7090844181";
        google_ad_width = 728;
        google_ad_height = 90;
    </script>
    <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</div>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
