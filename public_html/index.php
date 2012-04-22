<?php
$recommends = json_decode(file_get_contents('../recommend.json'));
$id = $recommends[rand(0, count($recommends))]->id;
require_once '../model.php';
if (isset($_GET['id'])) {
    $result = validateNaverId($id);
    if (empty($result)) {
        $id = $_GET['id'];
    }
}
$data = getData($id);

include('../templates/frame.php');
