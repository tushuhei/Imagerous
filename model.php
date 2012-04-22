<?php
function getData ($url) {
    libxml_use_internal_errors(true);
    $content = file_get_contents($url);
    $doc = new DOMDocument();
    $doc->loadHTML($content);
    libxml_clear_errors();
    $xpath = new DOMXPath($doc);
    $nodes = $xpath->query('//img[@class="MTMItemThumb"]');
    $data = array();
    $data['images'] = array();
    foreach ($nodes as $node) {
        $data['images'][] = $node->getAttribute('src');
    }
    $nodes = $xpath->query('//title');
    $data['title'] = urldecode($nodes->item(0)->textContent);
    return $data;
}

function validateNaverUrl ($url) {
    $result = array();
    $id = null;
    if ($url === null) {
        $result[] = 'URL が空です';
    }
    else if (!is_string($url) or !mb_check_encoding($url, 'UTF-8')) {
        $result[] = 'URL が不正です';
    }
    else {
        $url = preg_replace('/\s+/u', '', $url);
        if (mb_strlen($url, 'UTF-8') > 100) {
            $result[] = 'URL が長すぎます';
        }
        else if (mb_strlen($url, 'UTF-8') < 1) {
            $result[] = 'URL が短すぎます';
        }
        else {
            $re = '/http:\/\/matome\.naver\.jp\/odai\/([0-9]+)\/?$/u';
            if (preg_match($re, $url, $matches)) {
                $id = $matches[1];
            }
            else {
                $result[] = 'NAVER まとめの URL ではありません';
            }
        }
    }
    return array($result, $id);
}
/*
$url = 'http://matome.naver.jp/odai/2133506700206695001';
var_dump(getData($url));
 */
