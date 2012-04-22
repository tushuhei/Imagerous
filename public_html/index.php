<?php
$recommends = json_decode(file_get_contents('../recommend.json'));
$id = $recommends[rand(0, count($recommends)-1)]->id;
require_once '../model.php';
if (isset($_GET['id'])) {
    $result = validateNaverId($_GET['id']);
    if (empty($result)) {
        $id = $_GET['id'];
    }
}
$data = getData($id);
if ($data === null) {
    $result[] = "NAVER まとめの ID ではありません";
    $id = $recommends[rand(0, count($recommends)-1)]->id;
    $data = getData($id);
}
include('../templates/frame.php');
