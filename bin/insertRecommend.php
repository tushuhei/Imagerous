<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Recommend.php';
require_once $basedir.'/util.php';
$db = connect_db();

$id = $argv[1];
$recommend = new Recommend();
$recommend->id = $id;
$recommend->insertById($db);
