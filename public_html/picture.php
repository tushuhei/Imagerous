<?
$recommends = json_decode(file_get_contents('../recommend.json'));
shuffle($recommends);
$id = $recommends[rand(0, count($recommends)-1)]->id;
require_once '../Picture.php';
if (isset($_GET['id'])) {
} else {
}
