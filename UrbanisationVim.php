<html>
<?php
require 'vendor/autoload.php';
use Vimeo\Vimeo;

$client = new Vimeo("8e27e8883a3375968dc44d6cf7ccac05b1e6d94c", "J0td4NdiXHuLyeAc+vZOgJeMaYt4fg09E3jd/xUOYeDQa9P8kj+Yeoh/wGuV7Wgq0zAG8L18KwrnJFpY5EUyLYe6P2xDCzVhYt9HavOlcZjR9JhvguAJP1p186zqw7Ld", "8368899522fa35fd825e92355b913d47");

$response = $client->request('/videos', array(
    'page' => 1,
    'per_page' => 10,
    'query' => 'inception trailer',
    'sort' => 'relevant',
    'direction' => 'desc',
    'filter' => 'CC'
));
//print_r($response["body"]["data"]["0"]);
foreach($response["body"]["data"] as &$value)
{
	echo "Preview : " . $value["pictures"]["base_link"]  . " Video name : " . $value["name"] . " Video link : " .$value["link"] . " Video duration : " . $value["duration"]. " Quality  : " . $value["height"] . " Channel Name : " . $value["user"]["name"] . " Created : " . (intval(date("Y")) - intval(substr($value["created_time"],0,4))) . " years ago" .  " Description : " . $value["description"] . "</br></br>";
}

?>
</html>