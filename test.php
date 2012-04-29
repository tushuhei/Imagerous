<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';
$articleId  = "2133122239026014001";
$imageId = "2133122302026046803";
$picture = new Picture();
$picture->articleId = $articleId;
$picture->id = $imageId;
$picture->getSmallPic();
var_dump($picture);
