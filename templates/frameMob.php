<!DOCTYPE html>
<html>
    <head>
        <? include('header.php') ?>
    </head>
    <body style="background-color:#222">
        <? include('navbar.php') ?>
        <div>
            <div id="mainFrame">
                <?include($template.'Mob.php');?>
            </div>
            <span>
                <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?=$article->title?> | Imagerous*" data-url="http://imagero.us/index.php?id=<?=$article->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
            </span>
            <div class="fb-like" data-href="http://imagero.us/index.php?id=<?=$article->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
            <div style="color:#ddd; font-size:21px; margin:20px 0"> さがす </div>
            <form method="GET" action="search.php">
                <div class="input">
                    <input class="span4" name="query" type="text" value="<?if (isset($query)) {echo $query;} ?>">
                </div>
                <div style="float:right">
                    <input type="submit" class="btn btn-primary" value="検索"
                    onClick="_gaq.push(['_trackEvent','click-search-button');">
                </div>
            </form>
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
            <script type="text/javascript"><!--
            google_ad_client = "ca-pub-6865664974975544";
            /* imagerous-mobile-index-bottom */
            google_ad_slot = "0096993339";
            google_ad_width = 300;
            google_ad_height = 250;
            //-->
            </script>
            <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>
        </div>
    </body>
</html>
