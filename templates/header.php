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
            <meta property="og:image" content="<?=$ogp_pic->url?>">
        <? endforeach ?>
    <? endif ?>
<? elseif ($template === 'pictureTmp' or $template === 'effectTmp'): ?>
    <meta property="og:title" content="<?=$article->title?> <?=$picture->title?> | Imagerous*">
    <meta property="og:url" content="http://imagero.us/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>">
    <meta property="og:image" content="<?=$picture->url?>">
    <meta property="og:type" content="article">
<? elseif ($template === 'workTmp'): ?>
    <meta property="og:title" content="<?=$picture->title?> | Imagerous*">
    <meta property="og:url" content="http://imagero.us/work.php?id=<?=$work->id?>">
    <meta property="og:image" content="<?=$picture->url?>">
    <meta property="og:type" content="article">
<? endif ?>
<meta property="og:description" content="壁紙をまとめる、眺める、つかう。">
<meta property="og:site_name" content="Imagerous*">
<meta property="fb:admins" content="100000617688375">
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
<link rel="stylesheet" type="text/css" href="/css/bootstrap/css/bootstrap.css">
<!--[if IE]><link rel="stylesheet" href="/css/ie.css"><![endif]-->
<? if (isMobile()): ?>
    <link href="/css/mobile.css" rel="stylesheet" type="text/css">
<? else: ?>
    <link href="/css/mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
    <link href="/css/tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 910px)" >
    <link href="/css/index.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 911px)" >
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
<script type="text/javascript">
    window.google_analytics_uacct = "UA-30923853-3";
</script>
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script src="http://f1.nakanohito.jp/lit/index.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">try { var lb = new Vesicomyid.Bivalves("119599"); lb.init(); } catch(err) {} </script>
