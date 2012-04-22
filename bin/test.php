<?php
libxml_use_internal_errors(true);
$content = file_get_contents('http://matome.naver.jp/odai/2133506700206695001');
$doc = new DOMDocument();
$doc->loadHTML($content);
libxml_clear_errors();
$xpath = new DOMXPath($doc);
$nodes = $xpath->query('//head/title');
var_dump($nodes->item(0)->textContent);
