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
<div id="mobile_title">
    <? if (!empty($result)): ?>
    <div class="alert"><?=$result[0]?></div>
    <? endif ?>
    <?=$article->title?>
</div>
<div id="wide_top_ad">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- imagerous_mobile_top -->
    <ins class="adsbygoogle"
        style="display:inline-block;width:320px;height:50px"
        data-ad-client="ca-pub-2363640980453937"
        data-ad-slot="4552913533"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
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
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- imagerous_mobile_mid -->
    <ins class="adsbygoogle"
        style="display:inline-block;width:320px;height:50px"
        data-ad-client="ca-pub-2363640980453937"
        data-ad-slot="8983113137"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
<div id="article" style="visibility:hidden"><?=$article->id?></div>
