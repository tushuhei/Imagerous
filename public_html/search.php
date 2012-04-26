<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
}

$searcher = new Searcher();
$articles = $searcher::getArticles($query);

$page = 'searchresult';
include('../templates/frame.php');
