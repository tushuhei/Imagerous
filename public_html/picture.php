<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Picture.php';

$picture = new Picture();
$picture->id = null;

if (isset($_GET['article']) and isset($_GET['image'])) {
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = null;
    }
    $picture->articleId = $_GET['article'];
    $picture->id = $_GET['image'];
    $picture->getContents();
    $picture->getSmallPic($page);

    $article = new Article();
    $article->id = $picture->articleId;
    $article->getContents();
}

$template = 'pictureTmp';
if (isMobile()) {
    include('../templates/frameMob.php');
} else {
    include('../templates/frame.php');
}
