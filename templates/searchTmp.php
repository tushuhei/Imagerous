<script type="text/javascript" src="/js/searchresult.js"></script>
<div id="searchResultFeeds">
<div class="mobileOnly" style="color:#ddd;font-size:21px;">
    検索結果
</div>
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
