<?php
class Picture {
    public $id;
    public $articleId;
    public $title;
    public $url;

    public function getPicture () {
        libxml_use_internal_errors(true);
        $content = @file_get_contents('http://matome.naver.jp/odai/'.$this->articleId.'/'.$this->id);
        if ($content !== false) {
            $doc = new DOMDocument();
            $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
            libxml_clear_errors();

            $xpath = new DOMXPath($doc);
            $nodes = $xpath->query('//p[@class="mdEndView01Img01"]');

            foreach ($nodes as $node) {
                $this->url = $node->getElementsByTagName('a')->item(0)->getAttribute('href');
            }

            if (preg_match("/<title>(.+)?:.+<\/title>/i", $content, $matches)) { 
                $this->title = $matches[1];
            }
        } else {
            $this->id = null;
        }
    }

}
