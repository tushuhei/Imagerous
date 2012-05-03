<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Work.php';
require_once $basedir.'/util.php';

$db = connect_db('imagerous');
$id = $_GET['id'];
$work = new Work();
$work->id = $id;
$work->loadById($db);
$work->loadPicture();
$page = "workTemp";
include('../templates/frame.php');
