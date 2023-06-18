<?php
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| to this client's browser, allowing them to enjoy our application.
|
*/

if (!defined('base_url')) {
	define('base_url', 'http://localhost:90/mvogms/');
}

if (!defined('base_app')) {
	define('base_app', str_replace('\\', '/', __DIR__) . '/');
}

if (!defined('dev_data')) {
	define('dev_data', $dev_data);
}

if (!defined('DB_SERVER')) {
	define('DB_SERVER', "localhost");
}

if (!defined('DB_USERNAME')) {
	define('DB_USERNAME', "root");
}

if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', "");
}

if (!defined('DB_NAME')) {
	define('DB_NAME', "mvogms_db");
}


$ip = '';
$key = APIKEY;

$ch = curl_init(APIBASEURL.$ip.'?access_key='.$key.'');

curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$data = curl_exec($ch);
curl_close();

$api_result= json_decode($data,true);
echo $api_result['location']['capital'];


?>
