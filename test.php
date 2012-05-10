<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';
require_once $basedir.'/models/Work.php';
require_once $basedir.'/util.php';

$article = new Article();
$article->id = '2133620583597722001';
$article->getContents();
var_dump($article);
