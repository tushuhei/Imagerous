<?php
require_once $basedir.'/models/Picture.php';

class Article {
    public $id;
    public $title;
    public $thumb;
    public $pictures;

    public function getContents () {
        libxml_use_internal_errors(true);
        $content = @file_get_contents('http://matome.naver.jp/odai/'.$this->id);
        if ($content !== false) {
            $doc = new DOMDocument();
            $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
            libxml_clear_errors();

            $xpath = new DOMXPath($doc);
            $nodes = $xpath->query('//p[@class="mdMTMWidget01ItemImg01View"]');

            $this->pictures = array();
            foreach ($nodes as $node) {
                $href = $node->getElementsByTagName('a')->item(0)->getAttribute('href');
                preg_match("/.+?\/([0-9]+)$/u", $href, $matches);
                $picture = new Picture();
                $picture->id = $matches[1];
                $picture->articleId = $this->id;
                $picture->small = $node->getElementsByTagName('img')->item(0)->getAttribute('src');
                $this->pictures[] = $picture;
            }

            $nodes = $xpath->query('//div[@class="mdHeading01Thumb"]/img');
            $this->thumb = $nodes->item(0)->getAttribute('src');
            $nodes = $xpath->query('//h1[@class="mdHeading01Ttl"]');
            $this->title = $nodes->item(0)->textContent;
        } else {
            $this->id = null;
        }
    }

    public function validateNaverId () {
        $result = array();
        if ($this->id === null) {
            $result[] = 'ID が空です';
        }
        else if (!is_string($this->id) or !mb_check_encoding($this->id, 'UTF-8')) {
            $result[] = 'ID が不正です';
        }
        else {
            $id = preg_replace('/\s+/u', '', $this->id);
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

}