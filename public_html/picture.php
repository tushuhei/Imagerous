<?
require_once '../Picture.php';
require_once '../Base.php';

$picture = new Picture();
$picture->id = null;

if (isset($_GET['article']) and isset($_GET['image'])) {
    $picture->articleId = $_GET['article'];
    $picture->id = $_GET['image'];
    $picture->getPicture();
}

$page = 'single';
include('../templates/frame.php');
