<?php
require_once '/home/ubuntu/twtushuhei/phplib/util.php';
class TweetSource {
  public static function getUserTimeline($screen_name) {
    $api_response = json_decode(file_get_contents('http://api.twitter.com/1/statuses/user_timeline.json?screen_name=' . urlencode($screen_name)));
    return $api_response;
  }
  public static function getUserTimelineById($id) {
    $api_response = json_decode(file_get_contents('http://api.twitter.com/1/statuses/user_timeline.json?user_id=' . $id));
    return $api_response;
  }
  public static function getUserFollowers($screen_name, $maxiter = 100) {
      $cursor = -1;
      $result = array();
      $counter = 0;
      while ($cursor != 0 and $counter < $maxiter) {
          $api_response = json_decode(file_get_contents('https://api.twitter.com/1/followers/ids.json?cursor=' . $cursor . '&screen_name=' . urlencode($screen_name)));
          foreach ($api_response->ids as $id) {
              $result[] = $id;
          }
          $cursor = $api_response->next_cursor_str;
          $counter++;
          echo "fetched ".($counter * 5000)." people.\n";
          sleep(1);
      }
      return $result;
  }
  public static function getUserId($screen_name) {
    $api_response = json_decode(file_get_contents('https://api.twitter.com/1/users/lookup.json?screen_name=' . urlencode($screen_name)));
    return ($api_response[0]->id_str);
  }
  public static function getUserScreenName($id) {
    $api_response = json_decode(file_get_contents('https://api.twitter.com/1/users/lookup.json?user_id=' . $id));
    return ($api_response[0]->screen_name);
  }
}
// あとあとTwitterAPIの仕様が変わったときに対処できるように、ダミークラスが必要だと判断し、このようなクラスを準備した。
// オブジェクトを１つ作るわけではない。複数のタイムラインをつくるオブジェクト。ひとつひとつのtweetを生成するというわけではない→staticで用意

