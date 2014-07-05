<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/util.php';
require_once $basedir.'/models/Twitter.php';
$db = connect_db();
$sth = $db->prepare("SELECT id FROM topics");
$sth->execute();
$topics = $sth->fetchall();
foreach ($topics as $topic) {
    echo "topic is: {$topic["id"]} \n";
    $url = "http://matome.naver.jp/topic/{$topic["id"]}";
    $xpath = getXpath($url);
    $nodes = $xpath->query('//div[@class="MdPagination04"]/a[last()]');
    $last_page = (int)$nodes->item(0)->textContent;
    echo "page count: {$last_page} \n";
    $data = array();
    for ($i = 0; $i < $last_page; $i++) {
        $url = "http://matome.naver.jp/topic/{$topic["id"]}?page=" . ($i + 1);
        $xpath = getXpath($url);
        $nodes = $xpath->query('//li[@class="mdMTMTtlList02Item"]/div/h3/a/@href');
        foreach ($nodes as $node) {
            $matome_url = $node->textContent;
            preg_match("/^http:\/\/matome\.naver\.jp\/odai\/(\d+)$/", $matome_url, $matches);
            $data[] = "('{$matches[1]}', '{$topic["id"]}')";
        }
        echo " $i";
        sleep(1);
    }
    $sql = "INSERT IGNORE INTO matome (id, topic) VALUES " . implode(",", $data);
    echo $sql;
    $db->query($sql);
    sleep(1);
}
