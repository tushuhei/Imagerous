<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Article.php';
if (isset($_POST['page']) and isset($_POST['article'])) {
    $page = $_POST['page'];
    $articleId = $_POST['article'];
}
$article = new Article();
$article->id = $articleId;
$result = $article->validateNaverId();
if(empty($result)) {
    $article->getContents($page);
    echo json_encode($article->pictures);
}

