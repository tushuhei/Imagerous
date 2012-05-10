<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/util.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Topic.php';
require_once $basedir.'/models/Twitter.php';
$db = connect_db();

$topic = new Topic();
$topicIds = $topic::selectTopics($db);
$contents = simplexml_load_file("http://matome.naver.jp/feed/topic/".$topicIds[0]);
$items = array();
foreach ($contents->channel->item as $item) {
    $items[] = $item;
}
shuffle($items);

$twitter = new Twitter();
foreach ($items as $item) {
    if (preg_match('/(画像|壁紙|ショット|待ち?受け?)/u', $item->title)) {
        preg_match('/http\:\/\/matome\.naver\.jp\/odai\/([0-9]+)/', $item->guid, $match);
        echo "{$item->title}: {$match[1]}\n";
        $article = new Article();
        $article->id = $match[1];
        $article->getContents();
        if (count($article->pictures) > 20) {
            $content = "{$item->title}\n http://imagero.us/index.php?id={$article->id}";
            $twitter::tweet($content);
            break;
        } else {
            sleep(3);
        }
    }
}
