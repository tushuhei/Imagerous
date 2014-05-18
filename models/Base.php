<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/util.php';
require_once $basedir.'/models/Recommend.php';
$db = connect_db();
$recommend = new Recommend();
$recommends = $recommend::getAll($db);
shuffle($recommends);

function isMobile () {
    $uas = array('iPhone', 'iPod', 'Android', 'dream', 'CUPCAKE', 'blackberry', 'webOS', 'incognito', 'webmate');
    foreach ($uas as $ua) {
        if (preg_match("/$ua/i", $_SERVER['HTTP_USER_AGENT'])) {
            return true;
            break;
        }
    }
    return false;
}
