<?
$recommends = json_decode(file_get_contents('../recommend.json'));
shuffle($recommends);
require_once '../Picture.php';
$picture = new Picture();
$picture->id = null;

if (isset($_GET['article']) and isset($_GET['image'])) {
    $picture->articleId = $_GET['article'];
    $picture->id = $_GET['image'];
    $picture->getPicture();
}

$page = 'single';
include('../templates/frame.php');
