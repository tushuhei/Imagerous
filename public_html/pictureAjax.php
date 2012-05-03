<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Article.php';
if (isset($_POST['direction']) and isset($_POST['picture']) and isset($_POST['article']) and isset($_POST['page'])) {
    $direction = (boolean)$_POST['direction'];
    $articleId = $_POST['article'];
    $pictureId = $_POST['picture'];
    $page = $_POST['page'];
}
$article = new Article();
$article->id = $articleId;
$result = $article->validateNaverId();
if(empty($result)) {
    $article->getContents($page);
}

for ($i = 0; $i < count($article->pictures); $i++) {
    if ($article->pictures[$i]->id == $pictureId) {
        $index = $i;
    }
}
if ($direction) {
    if (isset($article->pictures[$index + 1])) {
        $objPic = $article->pictures[$index + 1];
    } else {
        $article->getContents($page + 1);
        $objPic = $article->pictures[0];
    }
} else {
    if (isset($article->pictures[$index - 1])) {
        $objPic = $article->pictures[$index - 1];
    } else {
        $article->getContents($page - 1);
        $objPic = $article->pictures[count($article->pictures)];
    }
}

$picture = new Picture();
$picture->id = $objPic->id;
$picture->articleId = $article->id;
$picture->getContents ();
$picture->small = $objPic->small;
echo json_encode($picture);
