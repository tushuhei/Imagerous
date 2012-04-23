<?php
class Article {
    public $id;
    public $title;
    public $thumb;
    public $contents;

    public function getArticle () {
        libxml_use_internal_errors(true);
        $content = @file_get_contents('http://matome.naver.jp/odai/'.$this->id);
        if ($content !== false) {
            $doc = new DOMDocument();
            $doc->loadHTML($content);
            libxml_clear_errors();

            $xpath = new DOMXPath($doc);
            $nodes = $xpath->query('//p[@class="mdMTMWidget01ItemImg01View"]');

            $this->contents = array();
            foreach ($nodes as $node) {
                $this->contents[] = array(
                    "image" => $node->getElementsByTagName('img')->item(0)->getAttribute('src'),
                    "href" => $node->getElementsByTagName('a')->item(0)->getAttribute('href')
                );
            }

            $nodes = $xpath->query('//div[@class="mdHeading01Thumb"]/img');
            $this->thumb = $nodes->item(0)->getAttribute('src');
            if (preg_match("/<title>(.*?)<\/title>/i", $content, $matches)) { 
                $this->title = $matches[1];
            }
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
