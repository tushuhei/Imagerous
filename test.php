<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';
$article = new Article();
$article->id = "2009051915323966952";
$article->getWidgetData();
var_dump($article->wdata);
