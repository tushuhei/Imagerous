<?php
$bindir = dirname(__FILE__);
$logdir = $bindir . '/../log/cron';
?>
# tweet
1 * * * * php <?=$bindir?>/tweetHotEntry.php >> <?=$logdir?>/tweetHotEntry_stdout.log 2>> <?=$logdir?>/tweetHotEntry_stderr.log
