<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Article.php';
if (isset($_POST['direction']) and isset($_POST['picture']) and isset($_POST['article']) and isset($_POST['page'])) {
    $direction = (boolean)$_POST['direction'];
    $articleId = $_POST['article'];
    $picture = $_POST['picture'];
    $page = $_POST['page'];
}
$article = new Article();
$article->id = $articleId;
$result = $article->validateNaverId();
if(empty($result)) {
    $article->getContents($page);
}

for ($i = 0; $i < count($article->pictures); $i++) {
    if ($article->pictures[$i]->id == $picture) {
        $index = $i;
    }
}
if ($direction) {
    if (isset($article->pictures[$index + 1])) {
        echo json_encode($article->pictures[$index + 1]);
    } else {
        $article->getContents($page + 1);
        echo json_encode($article->pictures[0]);
    }
} else {
    if (isset($article->pictures[$index - 1])) {
        echo json_encode($article->pictures[$index - 1]);
    } else {
        $article->getContents($page - 1);
        echo json_encode($article->pictures[count($article->pictures)]);
    }
}
