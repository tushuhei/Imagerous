<?php
$basedir = dirname(__FILE__) . '/..';
// おすすめ json の取得
$recommends = json_decode(file_get_contents($basedir.'/recommend.json'));
shuffle($recommends);

function getAllWorks ($db) {
    $query = $db->query("SELECT id FROM works ORDER BY create_time DESC LIMIT 5");
    $result = array();
    foreach($query as $row) {
        $result[] = $row['id'];
    }
    return $result;
}
