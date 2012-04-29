<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';
$articleId  = "2130192261269150801";
$imageId = "2130192285769153803";
$picture = new Picture();
$picture->articleId = $articleId;
$picture->id = $imageId;
$picture->getSmallPic(2);
var_dump($picture);
