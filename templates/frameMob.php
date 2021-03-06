<!DOCTYPE html>
<html>
    <head>
        <? include('header.php') ?>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap/css/bootstrap.min.css">
        <link href="/css/mobile.css" rel="stylesheet" type="text/css">
    </head>
    <body style="background-color:#222">
        <? include('navbar.php') ?>
        <div>
            <div id="mainFrame" class="clearfix">
                <?include($template.'Mob.php');?>
            </div>
            <div style="margin-top:10px">
                <span>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?=$article->title?> | Imagerous*" data-url="http://imagero.us/index.php?id=<?=$article->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
                </span>
                <div class="fb-like" data-href="http://imagero.us/index.php?id=<?=$article->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
            </div>
            <div style="color:#ddd; font-size:21px; margin:20px 0"> さがす </div>
            <form method="GET" action="search.php" class="form-search">
                <div class="input">
                    <input class="span3" name="query" type="text" value="<?if (isset($query)) {echo $query;} ?>" style="margin-bottom: 0">
                    <button  class="btn btn-primary" onClick="_gaq.push(['_trackEvent','click-search-button']);">検索</button>
                </div>
            </form>
            <? if (isset($article->related) and $article->related): ?>
            <div style="color:#ddd; font-size:21px; margin:20px 0"> 関連コンテンツ </div>
            <? foreach ($article->related as $related): ?>
            <a href="index.php?id=<?=$related->id?>">
            <div class="side_feed clearfix">
                <div style="float:left; width:30%; text-align:center">
                    <img src="<?=$related->thumb?>" width="50">
                </div>
                <div style="float:left; width:65%; margin-left:5px;">
                    <?=$related->title?>
                </div>
            </div>
            </a>
            <? endforeach ?>
            <? endif ?>
            <div style="color:#ddd; font-size:21px; margin:20px 0"> おすすめ </div>
            <? for($i = 0; $i < 5; $i++): ?>
            <a href="index.php?id=<?=$recommends[$i]->id?>">
            <div class="side_feed clearfix">
                <div style="float:left; width:30%; text-align:center">
                    <img src="<?=$recommends[$i]->thumb?>" width="50">
                </div>
                <div style="float:left; width:65%; margin-left:5px;">
                    <?=$recommends[$i]->title?>
                </div>
            </div>
            </a>
            <? endfor ?>
        </div>
        <div style="margin-top:10px">
        <? if ($show_ad): ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- imagerous_mobile_bot -->
            <ins class="adsbygoogle"
                style="display:inline-block;width:320px;height:50px"
                data-ad-client="ca-pub-2363640980453937"
                data-ad-slot="2936579531"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        <? endif ?>
        </div>
        <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
        <script> var isMobile = <?=(isMobile())?1:0?>; </script>
        <script type="text/javascript" src="/js/index.js"></script>
    </body>
</html>
