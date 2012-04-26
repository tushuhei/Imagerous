<?php
require_once $basedir.'/models/Article.php';

class Searcher {

    public static function getArticles($query) {
        libxml_use_internal_errors(true);
        $content = @file_get_contents('http://matome.naver.jp/search?q='.htmlspecialchars($query));
        $doc = new DOMDocument();
        $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();

        $xpath = new DOMXPath($doc);
        $nodes = $xpath->query('//li[@class="mdMTMTtlList03Item"]');

        $result = array();
        foreach ($nodes as $node) {
            $img = $node->getElementsByTagName('img')->item(0);
            $thumb = null;
            if(isset($img)) { 
                $thumb = $img->getAttribute('src');
                $title = $node->getElementsByTagName('h3')->item(0)->textContent;
                if (preg_match('/(画像|壁紙|ショット)/u', $title, $match)) {
                    $link = $node->getElementsByTagName('a')->item(0)->getAttribute('href');
                    preg_match('/http:\/\/matome\.naver\.jp\/odai\/([0-9]+)/', $link, $matches);
                    $article = new Article();
                    $article->id = $matches[1];
                    $article->thumb = $thumb;
                    $article->title = $title;
                    $article->link = $link;
                    $result[] = $article;
                }
            }
        }

        return $result;
    }

}