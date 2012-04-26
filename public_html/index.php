<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';

$article = new Article();

// GET 変数のバリデーション
if (isset($_GET['id'])) {
    $article->id = $_GET['id'];
    $result = $article->validateNaverId();
    if (!empty($result)) {
        $article->id = $recommends[rand(0, count($recommends)-1)]->id;
    }
} else {
    $article->id = $recommends[rand(0, count($recommends)-1)]->id;
}
$article->getContents();

// 取得出来なかったときの対処
if ($article->id === null) {
    $result[] = "NAVER まとめの ID ではありません";
    $article->id = $recommends[rand(0, count($recommends)-1)]->id;
    $article->getContents();
}

// OGP 用に3つ画像を取ってくる
$ogp_pics = array();
for ($i = 0; $i < 3; $i++ ) {
    $ogp_pic = new Picture();
    $ogp_pic->id = $article->pictures[$i]->id;
    $ogp_pic->articleId = $article->id;
    $ogp_pic->getContents();
    $ogp_pics[] = $ogp_pic;
}

// 写真をシャッフルする
shuffle($article->pictures);

$page = 'booth_square';

include('../templates/frame.php');
