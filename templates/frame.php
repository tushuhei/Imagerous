<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> NAVER まとめの画像まとめ </title>
</head>
<body>
<h1> NAVER まとめの画像まとめ </h1>
画像をまとめたい NAVER まとめの URL を入れてね！(例 http://matome.naver.jp/odai/2132703381041239401)
<form method="GET" action="#">
    <input type="text" size="100" name="url">
    <input type="submit">
</form>
<hr>
<? foreach($images as $image): ?>
    <img src="<?=$image?>">
<? endforeach ?>
</body>
</html>
