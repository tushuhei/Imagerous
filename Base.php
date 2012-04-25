<?php
// おすすめ json の取得
$recommends = json_decode(file_get_contents('../recommend.json'));
shuffle($recommends);
