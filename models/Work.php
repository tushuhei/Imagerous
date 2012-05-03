<?php
require_once $basedir.'/models/Article.php';

class Work {
    public $id;
    public $articleId;
    public $pictureId;
    public $pictureObj;
    public $imagedata;

    public function insert ($db) {
        $stmt = $db->prepare("
            INSERT INTO works (
                article,
                picture,
                imagedata
            ) VALUES (
                :article,
                :picture,
                :imagedata
            )");

        $stmt->execute(array(
            "article" => $this->articleId,
            "picture" => $this->pictureId,
            "imagedata" => $this->imagedata
        ));

        $this->id = $db->lastInsertId();
    }

    public function loadById ($db) {
        $stmt = $db->prepare("
            SELECT
            article,
            picture,
            imagedata,
            create_time
            FROM works
            WHERE id = :id
            ");
        $stmt->execute(array(
            "id" => $this->id
        ));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->articleId = $result['article'];
        $this->pictureId = $result['picture'];
        $this->imagedata = $result['imagedata'];
        $this->create_time = $result['create_time'];
    }

    public function loadPicture () {
        $picture = new Picture();
        $picture->id = $this->pictureId;
        $picture->articleId = $this->articleId;
        $picture->getContents();
        $picture->getSmallPic();
        $this->pictureObj = $picture;
    }
}
