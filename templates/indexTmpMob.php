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
<div id="mobile_title">
<? if (!empty($result)): ?>
<div class="alert"><?=$result[0]?></div>
<? endif ?>
<?=$article->title?>
</div>
<div id="wide_top_ad">
    <script type="text/javascript">
        google_ad_client = "ca-pub-8950789672544776";
        /* imagerous-mobile-index-top */
        google_ad_slot = "8177211870";
        google_ad_width = 320;
        google_ad_height = 50;
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
        /* imagerous-mobile-index-footer */
        google_ad_slot = "9423122851";
        google_ad_width = 320;
        google_ad_height = 50;
    </script>
    <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</div>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
