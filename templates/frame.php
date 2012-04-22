<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> NAVER まとめの画像まとめ </title>
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
                            <a href="http://matome.naver.jp/odai/<?=$recommends[2]->id?>" target="_blank">
                                <?=$recommends[2]->name?>
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
                        <div class="side_feed clearfix">
                            <div style="float:left; width:50px">
                                <img src="<?=$recommend->image?>" width="50">
                            </div>
                            <div style="float:left; width:150px; margin-left:5px">
                                <?=$recommend->name?>
                            </div>
                        </div>
                        <? endforeach ?>
                    </div>
                    <div class="side_component">
                        <div class="side_title"> つくる </div>
                        NAVER まとめの URL を入力するだけでページをつくることができます。
                        <form method="GET" action="#">
                            <input type="text" size="100" name="url" placeholder="http://matome.naver.jp/odai/2127423633480175601">
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <div class="span10">
                    <!--Body content-->
                    <? foreach($data['images'] as $image): ?>
                    <img src="<?=$image?>">
                    <? endforeach ?>
                </div>
            </div>
        </div>
    </body>
</html>
