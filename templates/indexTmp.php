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
    <script type="text/javascript">
        google_ad_client = "ca-pub-8950789672544776";
        /* imagerous-index-top */
        google_ad_slot = "9642143535";
        google_ad_width = 728;
        google_ad_height = 90;
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
