<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Picture.php';

$article = new Article();
$article->id = '2133379328929348601';
$article->getContents();
$article->getAllPicURL();

$template = 'slideTmp';
include('../templates/frame.php');
