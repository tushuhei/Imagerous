<?php
require_once '../Article.php';

$recommends = json_decode(file_get_contents('../recommend.json'));
shuffle($recommends);
$article = new Article();

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

if ($article->id === null) {
    $result[] = "NAVER まとめの ID ではありません";
    $article->id = $recommends[rand(0, count($recommends)-1)]->id;
    $article->getArticle();
}
$page = 'index';

include('../templates/frame.php');
