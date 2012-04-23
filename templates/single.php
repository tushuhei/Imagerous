<? if ($picture->id !== null): ?>
<div style="width:780px">
    <img src="<?=$picture->url?>" width="780">
</div>
<div style="width:350px; position:absolute; right:20px;top:50px;">
    <div style="margin:15px 0">
    <a class="btn" href="<?=$picture->url?>"><i class="icon-download"></i> Download </a>
    </div>
    <div class="fb-comments" 
        data-href="http://imagerous.ddo.jp/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>" 
        data-num-posts="2" data-width="350" data-colorscheme="dark"></div>
</div>
<? else: ?>
<span style="color:#fff"> 画像が見つかりませんでした </span>
<? endif ?>
