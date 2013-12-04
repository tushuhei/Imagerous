<?php
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/models/Base.php';
require_once $basedir.'/models/Article.php';
require_once $basedir.'/models/Picture.php';

$article = new Article();

// GET 変数のバリデーション
if (isset($_GET['id'])) {
    $article->id = $_GET['id'];
    $result = $article->validateNaverId();
    if (!empty($result)) {
        $article->id = $recommends[rand(0, count($recommends)-1)]->id;
    }
} else {
    $article->id = $recommends[rand(0, count($recommends)-1)]->id;
}
$article->getContents();

// 取得出来なかったときの対処
if ($article->id === null) {
    $result[] = "NAVER まとめの ID ではありません";
    $article->id = $recommends[rand(0, count($recommends)-1)]->id;
    $article->getContents();
}

// OGP 用に3つ画像を取ってくる
$ogp_pics = array();
for ($i = 0; $i < 3; $i++ ) {
    $ogp_pic = new Picture();
    $ogp_pic->id = $article->pictures[$i]->id;
    $ogp_pic->articleId = $article->id;
    $ogp_pic->getContents();
    $ogp_pics[] = $ogp_pic;
}

// 写真をシャッフルする
shuffle($article->pictures);

// アダルトワード対策
$show_ad = true;
if(preg_match("/エロ|パンチラ|抜ける|アダルト|JK|18禁|oppai|SEX|アナル|エッチ|エロ|オ◯ンコ|お◯んこ|オ○ニー|オーガズム|おち○ぽ|おちんこ|オチンチン|おちんぽ|おっぱい|オナニー|オマンコ|おまんこ|おめこ|ガチハメ|くぱぁ|クリトリス|グロ|クンニ|コンドーム|ザーメン|ジュニアアイドル|スカトロ|スケベ|ズッポリ|セ○クス|セクース|セクス|セクロス|セッ○ス|セックス|セックル|セフレ|ソープランド|ダッチワイフ|チ○ポ|チ●ポ|ちんこ|チンポ|ちんぽ|ディルド|デカパイ|デカ尻|でか尻|デカ乳|でか乳|パイズリ|パイパン|バイブ責め|ハメ撮り|ハメ写メ|パンチラ|パンモロ|ファック|フェラ|マ○コ|マンコ|まんこ|まんスジ|マン汁|まん毛|レイピスト|レイプ|ロリコン|わいせつ|愛液|淫乱|援交|援助交際|我慢汁|顔射|騎乗位|逆さ撮り|巨乳|胸チラ|胸ちら|穴空き|雌穴|自画撮り|射精|手コキ|獣姦|人妻|正常位|生ハメ|素人娘|痴漢|痴女|中出し|潮吹|珍棒|電マ|奴隷|盗撮|肉便器|買春|売春|露出|勃起|無修正|乱交|立ちバック|輪姦|炉利|和姦|猥姦/", $article->title)) {
    $show_ad = false;
}


$template = 'indexTmp';

if (isMobile()) {
    include('../templates/frameMob.php');
} else {
    include('../templates/frame.php');
}
