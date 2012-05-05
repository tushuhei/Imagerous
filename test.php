<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';
require_once $basedir.'/models/Work.php';
require_once $basedir.'/util.php';
$db = connect_db();

$str = "ほげ待受け";
var_dump(preg_match('/(画像|壁紙|ショット|待ち?受け?)/u', $str, $match));
