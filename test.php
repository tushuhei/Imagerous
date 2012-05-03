<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';
require_once $basedir.'/models/Work.php';
require_once $basedir.'/util.php';

$db = connect_db('imagerous');

$work = new Work();
$work->id = 1;
$work->loadById($db);
var_dump($work);
