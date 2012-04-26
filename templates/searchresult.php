<div style="float:left; width:780px">
    <? foreach ($articles as $article): ?>
    <a href="index.php?id=<?=$article->id?>">
        <div class="feed clearfix">
            <div style="float:left; width:60px; text-align:center">
                <img src="<?=$article->thumb?>" width="50">
            </div>
            <div style="float:left;margin-left:5px;height:50px; width:710px">
                <?=$article->title?>
            </div>
        </div>
    </a>
    <? endforeach ?>
    <? if (count($articles) == 0): ?>
    <span style="color:#fff"> 記事が見つかりませんでした </span>
    <? endif ?>
</div>
