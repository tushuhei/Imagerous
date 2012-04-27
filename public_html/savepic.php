<?php
$fp = fopen('/001.png', "w");
fwrite($fp, base64_decode($_POST['img']));
fclose($fp);
