<meta charset="utf-8">
<? if(isMobile()): ?>
    <meta name="viewport" content="user-scalable=no, width=device-width">
<? endif ?>
<? if ($template === 'indexTmp'): ?>
    <? if (!isset($_GET['id'])): ?>
        <meta property="og:title" content="Imagerous*">
        <meta property="og:url" content="http://imagero.us">
        <meta property="og:type" content="website">
        <meta property="og:image" content="http://imagero.us/img/logo.png">
    <? else: ?>
        <meta property="og:title" content="<?=$article->title?> | Imagerous*">
        <meta property="og:url" content="http://imagero.us/index.php?id=<?=$article->id?>">
        <meta property="og:type" content="article">
        <? foreach ($ogp_pics as $ogp_pic): ?>
            <? if (isset($ogp_pic->url)): ?>
            <meta property="og:image" content="<?=$ogp_pic->url?>">
            <? endif ?>
        <? endforeach ?>
        <? if (count($article->pictures) < 15):?>
        <meta name="robots" content="noindex">
        <? endif ?>
    <? endif ?>
<? elseif ($template === 'pictureTmp'): ?>
    <meta property="og:title" content="<?=$article->title?> <?=$picture->title?> | Imagerous*">
    <meta property="og:url" content="http://imagero.us/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>">
    <meta property="og:image" content="<?=$picture->url?>">
    <meta property="og:type" content="article">
<? elseif ($template === 'effectTmp'): ?>
    <meta property="og:title" content="<?=$article->title?> <?=$picture->title?> | Imagerous*">
    <meta property="og:url" content="http://imagero.us/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>">
    <meta property="og:image" content="<?=$picture->url?>">
    <meta property="og:type" content="article">
    <meta name="robots" content="noindex">
<? elseif ($template === 'workTmp'): ?>
    <meta property="og:title" content="<?=$picture->title?> | Imagerous*">
    <meta property="og:url" content="http://imagero.us/work.php?id=<?=$work->id?>">
    <meta property="og:image" content="<?=$picture->url?>">
    <meta property="og:type" content="article">
    <meta name="robots" content="noindex">
<? endif ?>
<meta property="og:description" content="壁紙をまとめる、眺める、つかう。">
<meta property="og:site_name" content="Imagerous*">
<meta property="fb:admins" content="100000617688375">
<meta property="fb:app_id" content="366371993398682">
<? if ($template === 'indexTmp'): ?>
    <? if (!isset($_GET['id'])): ?>
        <title> Imagerous* </title>
    <? else: ?>
        <title> <?=$article->title?> | Imagerous* </title>
    <? endif ?>
<? elseif ($template === 'pictureTmp' or $template === 'effectTmp'): ?>
    <title> <?=$article->title?> <?=$picture->title?> | Imagerous* </title>
<? elseif ($template === 'workTmp'): ?>
    <title> <?=$picture->title?> | Imagerous* </title>
<? endif ?>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-30923853-3']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
