<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/util.php';
$db = connect_db();
$recommends = json_decode(file_get_contents($basedir.'/recommend.json'));
foreach ($recommends as $recommend) {
        $stmt = $db->prepare("
            INSERT INTO recommends (
                id,
                thumb,
                title
            ) VALUES (
                :id,
                :thumb,
                :title
            )");
        $stmt->execute(array(
            "id" => $recommend->id,
            "thumb" => $recommend->thumb,
            "title" => $recommend->title
        ));
}
