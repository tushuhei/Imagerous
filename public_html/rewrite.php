<?
$basedir = dirname(__FILE__) . '/..';
require_once($basedir.'/model.php');
if (isset($_POST['url'])) {
    $url = $_POST['url'];
    list($result, $id) = validateNaverUrl($url);
    if(!empty($result)) {
        echo 'hoge';
        header("Location: http://dev.tushuhei.com/index.php?id=$id");
    } else {
        var_dump($result);
        include('../templates/frame.php');
    }
} else {
    header("Location: http://dev.tushuhei.com/index.php");
}

