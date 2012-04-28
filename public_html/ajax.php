<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Searcher.php';
if (isset($_POST['page']) and isset($_POST['query'])) {
    $page = $_POST['page'];
    $query = $_POST['query'];
}
$searcher = new Searcher();
$result = $searcher::getArticles($query, $page);
echo json_encode($result);

