<!DOCTYPE html>
<html>
    <head>
        <? include('header.php') ?>
    </head>
    <body style="background-color:#222">
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
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- side_scraper -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:160px;height:600px"
                        data-ad-client="ca-pub-2363640980453937"
                        data-ad-slot="9100864335"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div> 
                <div style="color:#ddd; margin-top:40px; text-align:center">
                    Powered by TMI-Webbiz7<br>
                    Copyright (c) 2012 Shuhei Iitsuka @tushuhei All rights reserved.
                </div>
            </div>
            <div id="mainFrame">
                <? include($template.'.php'); ?>
            </div>
        </div>
    </body>
</html>
