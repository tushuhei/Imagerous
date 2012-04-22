<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta property="og:title" content="Imagerous*">
        <meta property="og:type" content="website">
        <meta property="og:description" content="画像をまとめる">
        <meta property="og:url" content="http://imagerous.ddo.jp">
        <meta property="og:image" content="http://imagerous.ddo.jp/img/logo.png">
        <meta property="og:site_name" content="Imagerous*">
        <title> Imagerous* </title>
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="/css/index.css" type="text/css">
    </head>
    <body style="background-color:#222">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#">
                        Imagerous* 
                    </a>
                    <div class="container">
                        <ul class="nav">
                            <li>
                            <a href="http://matome.naver.jp/odai/<?=$data->id?>" target="_blank">
                            <img src="<?=$data->thumb?>" width="20">
                                <?=$data->title?>
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-top:50px">
            <div class="row-fluid">
                <div class="span2">
                    <!--Sidebar content-->
                    <div class="side_component">
                        <div class="side_title"> おすすめ </div>
                        <? foreach($recommends as $recommend): ?>
                        <a href="index.php?id=<?=$recommend->id?>">
                        <div class="side_feed clearfix">
                            <div style="float:left; width:50px">
                                <img src="<?=$recommend->thumb?>" width="50">
                            </div>
                            <div style="float:left; width:150px; margin-left:5px;">
                                <?=$recommend->title?>
                            </div>
                        </div>
                        </a>
                        <? endforeach ?>
                    </div>
                    <div class="side_component">
                        <div class="side_title"> つくる </div>
                        <div style="margin-bottom:5px">NAVER まとめの URL を入力するだけでページをつくることができます。</div>
                        <form method="GET" action="#">
                            http://matome.naver.jp/odai/
                            <input type="text" size="100" name="id" placeholder="2127423633480175601">
                            <input type="submit" class="btn btn-primary">
                        </form>
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
                </div>
                <div class="span10">
                    <? if (!empty($result)): ?>
                    <div class="alert"><?=$result[0]?></div>
                    <? endif ?>
                    <!--Body content-->
                    <? foreach($data->images as $image): ?>
                    <a href="" class="main_image">
                        <img src="<?=$image?>">
                    </a>
                    <? endforeach ?>
                </div>
            </div>
        </div>
    </body>
</html>
