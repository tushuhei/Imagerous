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
                            <a href="http://matome.naver.jp/odai/<?=$data->id?>" target="_blank">
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
                </div>
                <div class="span10">
                    <!--Body content-->
                    <? if(count($data->images) != 0): ?>
                    <? foreach($data->images as $image): ?>
                    <img src="<?=$image?>">
                    <? endforeach ?>
                    <? else: ?>
                    <span style="color:#fff">データの取得に失敗しました。再度お試しください。</span>
                    <? endif ?>
                </div>
            </div>
        </div>
    </body>
</html>
