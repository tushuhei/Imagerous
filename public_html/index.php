<?php
require_once '../Article.php';
require_once '../Picture.php';

// おすすめ json の取得
$recommends = json_decode(file_get_contents('../recommend.json'));
shuffle($recommends);
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

// OGP 用にひとつ画像を取ってくる
$picture = new Picture();
$picture->id = $article->contents[0]['id'];
$picture->articleId = $article->id;
$picture->getPicture();

$page = 'booth';

include('../templates/frame.php');
