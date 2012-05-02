<? if (!empty($result)): ?>
<div class="alert"><?=$result[0]?></div>
<? endif ?>
<? for($i = 0; $i < count($article->pictures); $i++): ?>
<a class="main_image" href="picture.php?article=<?=$article->id?>&image=<?=$article->pictures[$i]->id?>">
    <img src="<?=$article->pictures[$i]->small?>" style="vertical-align:top">
</a>
<? endfor ?>
