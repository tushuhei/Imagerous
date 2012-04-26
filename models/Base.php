<?php
$basedir = dirname(__FILE__) . '/..';
// おすすめ json の取得
$recommends = json_decode(file_get_contents($basedir.'/recommend.json'));
shuffle($recommends);
