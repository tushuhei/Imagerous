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
                <span style="position:fixed; top:10px; right:140px">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?=$article->title?> | Imagerous*" data-url="http://imagero.us/index.php?id=<?=$article->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
                </span>
                <div style="position:fixed; top:10px; right:350px" class="fb-like" data-href="http://imagero.us/index.php?id=<?=$article->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
                <? elseif($template === 'pictureTmp' or $template === 'effectTmp'): ?>
                <ul class="nav">
                    <li>
                    <a href="http://matome.naver.jp/odai/<?=$picture->articleId?>/<?=$picture->id?>" target="_blank">
                        <?=$picture->title?>
                    </a>
                    </li>
                    <li>
                    <a href="/index.php?id=<?=$picture->articleId?>">
                        &nbsp;&nbsp; &lt;&lt;画像一覧に戻る
                    </a>
                    </li>
                </ul>
                <span style="position:fixed; top:10px; right:140px">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://imagero.us/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
                </span>
                <div style="position:fixed; top:10px; right:350px" class="fb-like" data-href="http://imagero.us/picture.php?article=<?=$picture->articleId?>&image=<?=$picture->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
                <? elseif($template === 'workTmp'): ?>
                <ul class="nav">
                    <li>
                    <a href="http://imagero.us/index.php?id=<?=$picture->articleId?>" target="_blank">
                        <?=$picture->title?>
                    </a>
                    </li>
                </ul>
                <span style="position:fixed; top:10px; right:140px">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://imagero.us/work.php?id=<?=$work->id?>" data-lang="ja" data-hashtags="imagerous">ツイート</a>
                </span>
                <div style="position:fixed; top:10px; right:350px" class="fb-like" data-href="http://imagero.us/work.php?id=<?=$work->id?>" data-send="false" data-layout="button_count" data-width="30" data-show-faces="false"></div>
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
