<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
require_once $basedir.'/models/Article.php';
$article = new Article();
$article->id = '2132697335040561001';
$article->getContents(1);
var_dump($article);
/*
$searcher = new Searcher();
var_dump($searcher::getArticles("AKB", 2));
 */
