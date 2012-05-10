<?
$basedir = dirname(__FILE__) . '/..';
require_once $basedir.'/rsc/twitteroauth.php';
class Twitter {
    public function tweet($out_tweet) {
        $to = new TwitterOAuth(
            'T1RGiTFmaMqmngkNPZRGA',
            'e8R7DAnIsYZZk96eZvHNdYBCXUhoQY3A4Ne7952afic',
            '576300337-I1wyS1oCBMSEJtOXhfDOAJ58zrV6JM76AUyhFbVM',
            '8XraanuVByfVmgoN8aap2I3PfJJu9Dr3euJ8yng4');
        $req = $to->OAuthRequest("http://api.twitter.com/1/statuses/update.xml","POST",
            array("status" => $out_tweet)
        );
        header("Content-Type: application/xml");
        echo $req;
    }
}
