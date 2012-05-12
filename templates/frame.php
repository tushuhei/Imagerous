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
                        <div class="input">
                            <input class="span3" name="query" type="text" value="<?if (isset($query)) {echo $query;} ?>">
                        </div>
                        <div style="float:right">
                            <input type="submit" class="btn btn-primary" value="検索"
                            onClick="_gaq.push(['_trackEvent','click-search-button']);">
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
                    <script type="text/javascript"><!--
                        google_ad_client = "ca-pub-6865664974975544";
                        /* imagerous-side */
                        google_ad_slot = "5719922558";
                        google_ad_width = 160;
                        google_ad_height = 600;
                        //-->
                    </script>
                    <script type="text/javascript"
                        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
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
