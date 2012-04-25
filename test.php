<?php
require "Searcher.php";
$searcher = new Searcher();
$query = "KARA";
var_dump($searcher::getList($query));
