<?php
require_once '../Article.php';
require_once '../Picture.php';
require_once '../Base.php';

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
$article->getArticle();

// 取得出来なかったときの対処
if ($article->id === null) {
    $result[] = "NAVER まとめの ID ではありません";
    $article->id = $recommends[rand(0, count($recommends)-1)]->id;
    $article->getArticle();
}
shuffle($article->contents);

// OGP 用にひとつ画像を取ってくる
$pic1 = new Picture();
$pic1->id = $article->contents[0]['id'];
$pic1->articleId = $article->id;
$pic1->getPicture();
$pic2 = new Picture();
$pic2->id = $article->contents[1]['id'];
$pic2->articleId = $article->id;
$pic2->getPicture();
$pic3 = new Picture();
$pic3->id = $article->contents[2]['id'];
$pic3->articleId = $article->id;
$pic3->getPicture();

if ((int)($article->id/10000) % 2 == 0) {
    $page = 'booth_square';
} else {
    $page = 'booth';
}

include('../templates/frame.php');
