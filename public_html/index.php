<?php
require_once '../model.php';
if (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = 'http://matome.naver.jp/odai/2130836750868596501';
}
$images = getData($url);
include('../templates/frame.php');
