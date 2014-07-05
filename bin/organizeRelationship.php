<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Twitter.php';
$twitter = new Twitter();
$sleep_time = 10;

$follows = $twitter->getMyFollows();
$followers = $twitter->getMyFollowers();
$to_follows = array_diff($followers, $follows);
$to_unfollows = array_diff($follows, $followers);
echo "to follow count: ".count($to_follows);
echo "to unfollow count: ".count($to_unfollows);
foreach ($to_unfollows as $to_unfollow) {
    $twitter->unfollow($to_unfollow);
    echo "unfollowed: {$to_unfollow}\n";
    sleep($sleep_time);
}
foreach ($to_follows as $to_follow) {
    $twitter->follow($to_follow);
    echo "followed: {$to_follow}\n";
    sleep($sleep_time);
}

$queries = array("壁紙", "画像", "待ち受け", "アイドル");
foreach ($queries as $query) {
    $tweets = json_decode($twitter->search($query));
    foreach ($tweets->statuses as $tweet) {
        $twitter->follow($tweet->user->id_str);
        echo "follow: ".$tweet->user->id_str."\n";
        sleep($sleep_time);
    }
}
