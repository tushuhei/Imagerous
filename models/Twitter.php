<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/rsc/twitteroauth.php';
class Twitter {

    public $to;

    public function __construct() {
        $to = new TwitterOAuth(
            'T1RGiTFmaMqmngkNPZRGA',
            'e8R7DAnIsYZZk96eZvHNdYBCXUhoQY3A4Ne7952afic',
            '576300337-I1wyS1oCBMSEJtOXhfDOAJ58zrV6JM76AUyhFbVM',
            '8XraanuVByfVmgoN8aap2I3PfJJu9Dr3euJ8yng4');
        $this->to = $to;
    }

    public function tweet($out_tweet) {
        $req = $this->to->OAuthRequest("http://api.twitter.com/1.1/statuses/update.json","POST",
            array("status" => $out_tweet)
        );
        header("Content-Type: application/json");
        echo $req;
    }

    public function follow($target) {
        $req = $this->to->OAuthRequest("https://api.twitter.com/1/friendships/create.json?user_id=".$target, "POST", array());
        header("Content-Type: application/xml");
        echo $req;
    }

    public static function getUserTlBySn($screen_name) {
        $api_response = json_decode(file_get_contents('http://api.twitter.com/1/statuses/user_timeline.json?screen_name=' . urlencode($screen_name)));
        return $api_response;
    }

    public static function getUserTlById($id) {
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
            sleep(3);
        }
        return $result;
    }

    public static function getUserIdBySn($screen_name) {
        $api_response = json_decode(file_get_contents('https://api.twitter.com/1/users/lookup.json?screen_name=' . urlencode($screen_name)));
        return ($api_response[0]->id_str);
    }

    public static function getUserSnById($id) {
        $api_response = json_decode(file_get_contents('https://api.twitter.com/1/users/lookup.json?user_id=' . $id));
        return ($api_response[0]->screen_name);
    }
}
