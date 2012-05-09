<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable=no, width=device-width">
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
            <meta property="og:title" content="<?=$picture->title?> | Imagerous*">
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
            <title> <?=$picture->title?> | Imagerous* </title>
        <? elseif ($template === 'workTmp'): ?>
            <title> <?=$picture->title?> | Imagerous* </title>
        <? endif ?>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap/css/bootstrap.css">
        <!--[if IE]><link rel="stylesheet" href="/css/ie.css"><![endif]-->
        <link href="/css/mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
        <link href="/css/tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 910px)" >
        <link href="/css/index.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 911px)" >
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
    </head>
    <body style="background-color:#222">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=366371993398682";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" id="title" href="/">
                        Imagerous* 
                    </a>
                    <div id="navbar-info">
                        <? if ($template === 'indexTmp'): ?>
                        <ul class="nav">
                            <li>
                            <a href="http://matome.naver.jp/odai/<?=$article->id?>" target="_blank">
                            <img src="<?=$article->thumb?>" width="20">
                                <?=$article->title?>
                            </a>
                            </li>
                        </ul>
                        <span style="position:fixed; top:10px; right:240px">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?=$article->title?> | Imagerous*" data-url="http://imagero.us/index.php?id=<?=$article->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
                        </span>
                        <div style="position:fixed; top:10px; right:150px" class="fb-like" data-href="http://imagero.us/index.php?id=<?=$article->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
                        <? elseif($template === 'pictureTmp' or $template === 'effectTmp'): ?>
                        <ul class="nav">
                            <li>
                            <a href="http://matome.naver.jp/odai/<?=$picture->articleId?>/<?=$picture->id?>" target="_blank">
                                <?=$picture->title?>
                            </a>
                            </li>
                            <li>
                            <a href="/index.php?id=<?=$picture->articleId?>">
                                &nbsp;&nbsp; &lt;&lt; 画像一覧に戻る
                            </a>
                            </li>
                        </ul>
                        <span style="position:fixed; top:10px; right:240px">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://imagero.us/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
                        </span>
                        <div style="position:fixed; top:10px; right:150px" class="fb-like" data-href="http://imagero.us/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
                        <? elseif($template === 'workTmp'): ?>
                        <ul class="nav">
                            <li>
                            <a href="http://imagero.us/index.php?id=<?=$picture->articleId?>" target="_blank">
                                <?=$picture->title?>
                            </a>
                            </li>
                        </ul>
                        <span style="position:fixed; top:10px; right:240px">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://imagero.us/work.php?id=<?=$work->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
                        </span>
                        <div style="position:fixed; top:10px; right:150px" class="fb-like" data-href="http://imagero.us/work.php?id=<?=$work->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
                        <? elseif($template === 'searchTmp'): ?>
                        <ul class="nav">
                            <li>
                            <a>
                            <img src="/img/logo.png" width="20">
                            <?=$query?> の検索結果
                            </a>
                            </li>
                        </ul>
                        <? endif ?>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        <span style="position:fixed; top:10px; right:50px; visibility:hidden"><img src="/img/logo.png"></span>
                    </div>
                </div>
            </div>
        </div>
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
                            onClick="_gaq.push(['_trackEvent','click-search-button');">
                        </div>
                    </form>
                </div>
                <div class="side_component" style="margin-top:40px">
                    <div class="side_title"> おすすめ </div>
                    <? for($i = 0; $i < 6; $i++): ?>
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
                <?include($template.'.php');?>
            </div>
        </div>
        <div class="mobileOnly">
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
        </div>
        <div class="mobileOnly">
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
    </body>
</html>
