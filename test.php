<?php
$basedir = dirname(__FILE__) . '/..';
require_once('model.php');
$url = 'http://matome.naver.jp/odai/213083675086859a01';
list($result, $id) = validateNaverUrl($url);
var_dump($result);
var_dump($id);
