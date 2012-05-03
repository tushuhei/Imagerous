<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Work.php';
require_once $basedir.'/util.php';

$db = connect_db('imagerous');
$work = new Work();
$work->id = $_GET['id'];
$work->loadById($db);
$work->loadPicture();
$picture = $work->pictureObj;
$template = "workTmp";
include('../templates/frame.php');
