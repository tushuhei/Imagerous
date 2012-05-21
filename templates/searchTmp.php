<script type="text/javascript" src="/js/searchresult.js"></script>
<div id="searchResultFeeds">
<div class="mobileOnly" style="color:#ddd;font-size:21px;">
    検索結果
</div>
    <script type="text/javascript">
        google_ad_client = "ca-pub-8950789672544776";
        if ((navigator.userAgent.indexOf('iPhone') > 0
            && navigator.userAgent.indexOf('iPad') == -1)
            || navigator.userAgent.indexOf('iPod') > 0
            || navigator.userAgent.indexOf('Android') > 0) {
            /* imagerous-mobile-index-top */
            google_ad_slot = "8177211870";
            google_ad_width = 320;
            google_ad_height = 50;
        } else {
            /* imagerous-index-top */
            google_ad_slot = "9642143535";
            google_ad_width = 728;
            google_ad_height = 90;
        }
    </script>
    <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
    <? foreach ($articles as $article): ?>
    <a href="index.php?id=<?=$article->id?>">
        <div class="feed clearfix">
            <div style="float:left; width:60px; text-align:center">
                <img src="<?=$article->thumb?>" width="50">
            </div>
            <div id="feedTitle">
                <?=$article->title?>
            </div>
        </div>
    </a>
    <? endforeach ?>
    <? if (count($articles) == 0): ?>
    <span style="color:#fff"> 記事が見つかりませんでした </span>
    <? endif ?>
</div>
<? if (count($articles) !== 0): ?>
<a id="loadNext">
<div id="loadNext">
もっと見る
</div>
</a>
<? endif ?>
<div id="query" style="visibility:hidden"><?=$query?></div>
