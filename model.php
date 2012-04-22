<?php
require_once('Article.php');
function getData ($id) {
    libxml_use_internal_errors(true);
    $content = @file_get_contents('http://matome.naver.jp/odai/'.$id);
    if ($content !== false) {
        $doc = new DOMDocument();
        $doc->loadHTML($content);
        libxml_clear_errors();

        $xpath = new DOMXPath($doc);
        $nodes = $xpath->query('//img[@class="MTMItemThumb"]');

        $data = new Article();
        $data->id = $id;
        $data->images = array();
        foreach ($nodes as $node) {
            $data->images[] = $node->getAttribute('src');
        }

        $nodes = $xpath->query('//div[@class="mdHeading01Thumb"]/img');
        $data->thumb = $nodes->item(0)->getAttribute('src');
        if (preg_match("/<title>(.*?)<\/title>/i", $content, $matches)) { 
            $data->title = $matches[1];
        }
    } else {
        $data = null;
    }
    return $data;
}

function validateNaverId ($id) {
    $result = array();
    if ($id === null) {
        $result[] = 'ID が空です';
    }
    else if (!is_string($id) or !mb_check_encoding($id, 'UTF-8')) {
        $result[] = 'ID が不正です';
    }
    else {
        $id = preg_replace('/\s+/u', '', $id);
        $id = preg_replace('/\//u', '', $id);
        if (mb_strlen($id, 'UTF-8') > 100) {
            $result[] = 'ID が長すぎます';
        }
        else if (mb_strlen($id, 'UTF-8') < 1) {
            $result[] = 'ID が短すぎます';
        }
        else if (!preg_match('/^[0-9]+$/u', $id, $matches)) {
            $result[] = 'ID が数字でありません';
        }
    }
    return $result;
}
