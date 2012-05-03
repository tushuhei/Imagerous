<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/util.php';
require_once $basedir.'/models/Work.php';

$db = connect_db('imagerous');
$work = new Work();
if (isset($_POST['imagedata']) and isset($_POST['article']) and isset($_POST['picture'])) {
    $work->articleId = $_POST['article'];
    $work->pictureId = $_POST['picture'];
    $work->imagedata = $_POST['imagedata'];
    $work->insert($db);
    echo $work->id;
}
