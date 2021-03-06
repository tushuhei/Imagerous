<!DOCTYPE html>
<html>
    <head>
        <? include('header.php') ?>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap/css/bootstrap.min.css">
        <link href="/css/index.css?v=2" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
    </head>
    <body style="background-color:#222" id="body">
        <? include('navbar.php') ?>
        <div>
            <div id="leftSidebar">
                <!--Sidebar content-->
                <div class="side_component">
                    <div class="side_title"> Imagerous* とは？ </div>
                    壁紙をまとめる、眺める、つかう。新しいイメージキュレーションサービスです。
                </div>
                <div class="side_component">
                    <div class="side_title"> さがす </div>
                    <form method="GET" action="search.php">
                        <div class="input-append">
                            <input class="span2" style="margin-bottom:0" name="query" type="text" value="<?if (isset($query)) {echo $query;} ?>">
                            <button type="submit" class="btn btn-primary" style="margin-left: -5px"
                            onClick="_gaq.push(['_trackEvent','click-search-button']);">検索</button>
                        </div>
                    </form>
                </div>
                <? if (isset($article->related) and $article->related): ?>
                <div class="side_component" style="margin-top:40px">
                    <div class="side_title"> 関連コンテンツ </div>
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
                </div>
                <? endif ?>
                <div class="side_component" style="margin-top:40px">
                    <div class="side_title"> おすすめ </div>
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
                <div class="side_component">
                    <? if ($show_ad): ?>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- side_scraper -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:160px;height:600px"
                        data-ad-client="ca-pub-2363640980453937"
                        data-ad-slot="9100864335"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <? endif ?>
                </div> 
                <div style="color:#ddd; margin-top:40px; text-align:center">
                    Powered by TMI-Webbiz7<br>
                    Copyright (c) 2014 @tushuhei All rights reserved.
                </div>
            </div>
            <div id="mainFrame">
                <? include($template.'.php'); ?>
            </div>
        </div>
        <script> var isMobile = <?=(isMobile())?1:0?>; </script>
        <script type="text/javascript" src="/js/index.js?v=2"></script>
    </body>
</html>
