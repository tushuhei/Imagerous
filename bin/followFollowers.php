<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Twitter.php';

try{
    if (isset($argv[1])) {
        $target = $argv[1];
    } else {
        throw new Exception("コマンドライン引数で対象の Twitter アカウントを指定してください");
    }

    $twitter = new Twitter();
    $followers = $twitter::getUserFollowers($target, 10);
    shuffle($followers);
    echo "followers list is created!";
    for ($i = 0; $i < 20; $i++) {
        echo "\# $i following: ".$followers[$i];
        $twitter->follow($followers[$i]);
        sleep(3);
    }
}
catch (Exception $e) {
    var_dump($e);
}
