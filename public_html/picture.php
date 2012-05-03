<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Picture.php';

$picture = new Picture();
$picture->id = null;

if (isset($_GET['article']) and isset($_GET['image'])) {
    if(isset($_GET['page'])) {
        $pageNum = $_GET['page'];
    } else {
        $pageNum = null;
    }
    $picture->articleId = $_GET['article'];
    $picture->id = $_GET['image'];
    $picture->getContents();
    $picture->getSmallPic($pageNum);
}

$page = 'single';
include('../templates/frame.php');
