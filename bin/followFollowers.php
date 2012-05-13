<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Twitter.php';

try{
    if (isset($argv[1])) {
        $target = $argv[1];
    } else {
        throw new Exception("コマンドライン引数で対象の Twitter アカウントを指定してください");
    }

    if (isset($argv[2])) {
        $maxiter = intval($argv[2]);
        if ($maxiter > 100) {
            $maxiter = 100;
        }
    } else {
        $maxiter = 20;
    }

    $twitter = new Twitter();
    $followers = $twitter::getUserFollowers($target, 10);
    shuffle($followers);
    echo "followers list is created!";
    for ($i = 0; $i < $maxiter; $i++) {
        echo "\# $i following: ".$followers[$i];
        $twitter->follow($followers[$i]);
        sleep(3);
    }
}
catch (Exception $e) {
    var_dump($e);
}
