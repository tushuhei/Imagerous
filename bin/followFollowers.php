<?php
$basedir = dirname(__FILE__) . '/..';
require_once("twitteroauth.php");
require_once($basedir . '/phplib/util.php');
load_model('tweet_source');

try{
    if (isset($argv[1])) {
        $target = $argv[1];
    } else {
        throw new Exception("コマンドライン引数で対象の Twitter アカウントを指定してください");
    }

    $followers = TweetSource::getUserFollowers($target, 10);
    shuffle($followers);
    echo "followers list is created!";
    for ($i = 0; $i < 100; $i++) {
        echo "\# $i following: ".$followers[$i];
        follow($followers[$i]);
        sleep(10);
    }
}
catch (Exception $e) {
    var_dump($e);
}

function follow($to_follow) {
    $to = new TwitterOAuth(
        'jJovws58s2QWJL7B3sZNw',
        'cfd6Ndb20bcILHmSeaNgj4BAkDRCQNv0tSrIppLXJM',
        '520174252-eJrWKrMKEdilOHdJlW76CVWL7HlgQmfTC9zpXRnA',
        'PIedsEfAoI7s5Ndrb7zEi40OrwUz2h0BGzO14NfykBg');
    $req = $to->OAuthRequest("https://api.twitter.com/1/friendships/create.json?user_id=".$to_follow, "POST", array());
    header("Content-Type: application/xml");
    echo $req;
}
