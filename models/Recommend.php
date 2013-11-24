<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Article.php';

class Recommend {
    public $id;
    public $thumb;
    public $title;

    public static function getAll ($db) {
        $result = $db->query("
            SELECT
            id,
            thumb,
            title,
            create_time
            FROM recommends
            ");
        $recommends = array();
        foreach ($result as $row) {
            $article = new Article();
            $article->id = $row['id'];
            $article->thumb = $row['thumb'];
            $article->title = $row['title'];
            $recommends[] = $article;
        }
        return $recommends;
    }

    public function insertById ($db) {
        $article = new Article();
        $article->id = $this->id;
        $result = $article->validateNaverId();
        try {
            if (empty($result)) {
                $article->getContents();
                if ($article->id == null) {
                    throw new Exception("情報を取得できませんでした");
                }
            } else {
                throw new Exception(var_export($result));
            }
            $stmt = $db->prepare("
                INSERT INTO recommends (
                    id,
                    thumb,
                    title
                ) VALUES (
                    :id,
                    :thumb,
                    :title
                )");
            $stmt->execute(array(
                "id" => $this->id,
                "thumb" => $article->thumb,
                "title" => $article->title
            ));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteById ($db) {
        $stmt = $db->prepare("
            DELETE
            FROM recommends
            WHERE id = :id
            ");
        $stmt->execute(array(
            "id" => $this->id
        ));
    }

}
