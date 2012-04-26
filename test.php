<?php
$basedir = dirname(__FILE__) . '/';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
$searcher = new Searcher();
var_dump($searcher->getArticles("AKB"));
