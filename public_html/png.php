<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Work.php';
require_once $basedir.'/util.php';

$db = connect_db();

$work = new Work();
$work->id = $_GET['id'];
$work->loadById($db);
header("Content-Type: image/png");
echo base64_decode($work->imagedata);
