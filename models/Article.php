<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Picture.php';
require_once $basedir.'/models/Searcher.php';

class Article {
    public $id;
    public $title;
    public $thumb;
    public $pictures;
    public $wdata;
    public $related;

    public function getContents ($page = null) {
        libxml_use_internal_errors(true);
        if ($page === null) {
            $content = @file_get_contents('http://matome.naver.jp/odai/'.$this->id);
        } else {
            $content = @file_get_contents('http://matome.naver.jp/odai/'.$this->id.'?page='.intval($page));
        }
        if ($content !== false) {
            $doc = new DOMDocument();
            $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
            libxml_clear_errors();

            $xpath = new DOMXPath($doc);

            $this->pictures = array();
            $nodes = $xpath->query('//p[@class="mdMTMWidget01ItemImg01View"]');
            foreach ($nodes as $node) {
                $href = $node->getElementsByTagName('a')->item(0)->getAttribute('href');
                preg_match("/.+?\/([0-9]+)$/u", $href, $matches);
                $picture = new Picture();
                $picture->id = $matches[1];
                $picture->articleId = $this->id;
                $picture->small = $node->getElementsByTagName('img')->item(0)->getAttribute('src');
                $this->pictures[] = $picture;
            }

            $this->wdata = array();
            $nodes = $xpath->query('//div[@class="_jWidgetData"]');
            foreach ($nodes as $node) {
                $this->wdata[] = json_decode($node->getAttribute('data-contentdata'));
            }

            $nodes = $xpath->query('//div[@class="mdHeading01Thumb"]/img');
            if ($nodes->item(0)) {
                $this->thumb = $nodes->item(0)->getAttribute('src');
            }

            $nodes = $xpath->query('//h1[@class="mdHeading01Ttl"]');
            $this->title = $nodes->item(0)->textContent;
        } else {
            $this->id = null;
        }
    }

    public function getRelatedArticles () {
        $result = array();
        $url = "http://jlp.yahooapis.jp/KeyphraseService/V1/extract?appid=vekn5nWxg67HWN69sM4vwBEQAOATDik58ctDCW2ho6moWxuSg9h2.Tkl32sWd.I-&output=json&sentence=".urlencode($this->title);
        $data = (array)json_decode(@file_get_contents($url));
        $keyword = array_search(max($data), $data);
        $searcher = new Searcher();
        $articles = $searcher::getArticles($keyword);
        foreach ($articles as $article) {
            if ($article->id != $this->id) {
                $result[] = $article;
            }
        }
        if (count($related) < 3) {
            unset($data[$keyword]);
            $keyword = array_search(max($data), $data);
            $articles = $searcher::getArticles($keyword);
            foreach ($articles as $article) {
                if ($article->id != $this->id) {
                    $result[] = $article;
                }
            }
        }
        $this->related = $result;
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

    public function numOfPics($db) {
      if ($this->id) {
        $sth = $db->prepare("SELECT num_pic FROM matome WHERE id = ?");
        $sth->execute(array($this->id));
        $result = $sth->fetchAll();
        if (count($result) == 0) {
          return null;
        } else {
          return (int)$result[0]["num_pic"];
        }
      } else {
        return null;
      }
    }

}
