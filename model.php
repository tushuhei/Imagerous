<?php
function getData ($url) {
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $content = file_get_contents($url);
    $doc->loadHTML($content);
    libxml_clear_errors();
    $xpath = new DOMXPath($doc);
    $nodes = $xpath->query('//img[@class="MTMItemThumb"]');
    $images = array();
    foreach ($nodes as $node) {
        $images[] = $node->getAttribute('src');
    }
    $nodes = $xpath->query('//h1');
    var_dump($nodes);
    return $images;
}
