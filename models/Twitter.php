<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/rsc/twitteroauth.php';
class Twitter {

    public $to;
    public $me = 576300337;

    public function __construct() {
        $to = new TwitterOAuth(
            'T1RGiTFmaMqmngkNPZRGA',
            'e8R7DAnIsYZZk96eZvHNdYBCXUhoQY3A4Ne7952afic',
            '576300337-I1wyS1oCBMSEJtOXhfDOAJ58zrV6JM76AUyhFbVM',
            '8XraanuVByfVmgoN8aap2I3PfJJu9Dr3euJ8yng4');
        $this->to = $to;
    }

    public function tweet($out_tweet) {
        $res = $this->to->OAuthRequest("https://api.twitter.com/1.1/statuses/update.json","POST", array("status" => $out_tweet));
        return $res;
    }

    public function follow($target) {
        $res = $this->to->OAuthRequest("https://api.twitter.com/1.1/friendships/create.json", "POST", array("user_id" => $target));
        return $res;
    }

    public function unfollow($target) {
        $res = $this->to->OAuthRequest("https://api.twitter.com/1.1/friendships/destroy.json", "POST", array("user_id" => $target));
        return $res;
    }

    public function search($query) {
        $res = $this->to->OAuthRequest("https://api.twitter.com/1.1/search/tweets.json", "GET", array(
            "q" => $query,
            "lang" => "ja",
            "count" => 100
        ));
        return $res;
    }

    public function getMyFollowers($maxiter = 100) {
        return $this->getUserFollowers($this->me, $maxiter);
    }

    public function getUserFollows($user_id, $maxiter = 100) {
        $url = "https://api.twitter.com/1.1/friends/ids.json";
        return $this->getUserFriendships($user_id, $url, $maxiter);
    }

    public function getMyFollows($maxiter = 100) {
        return $this->getUserFollows($this->me, $maxiter);
    }

    public function getUserFollowers($user_id, $maxiter = 100) {
        $url = "https://api.twitter.com/1.1/followers/ids.json";
        return $this->getUserFriendships($user_id, $url, $maxiter);
    }

    public function getUserFriendships($user_id, $url, $maxiter = 100) {
        $cursor = -1;
        $result = array();
        $counter = 0;
        while ($cursor != 0 and $counter < $maxiter) {
            $res = $this->to->OAuthRequest($url, "GET", array(
                    "cursor" => $cursor,
                    "stringify_ids" => true,
                    "user_id" => $user_id
                ));
            $res = json_decode($res);
            foreach ($res->ids as $id) $result[] = $id;
            $cursor = $res->next_cursor_str;
            $counter++;
            echo "fetched ".($counter * 5000)." people.\n";
        }
        return $result;
    }

    public function getUserIdBySn($screen_name) {
        $res = $this->to->OAuthRequest("https://api.twitter.com/1.1/users/lookup.json", "GET", array("screen_name" => urlencode($screen_name)));
        $api_response = json_decode($res);
        return ($api_response[0]->id_str);
    }

    public function getUserSnById($user_id) {
        $res = $this->to->OAuthRequest("https://api.twitter.com/1.1/users/lookup.json", "GET", array("user_id" => $user_id));
        $api_response = json_decode($res);
        return ($api_response[0]->screen_name);
    }
}
