<?php
/*
|--------------------------------------------------------------------------
|            This file is part of the Telthemweb package.
|               
|--------------------------------------------------------------------------
|
|     For the full copyright and license information, please view the LICENSE
|       file that was distributed with this source code.
|
*/
namespace Ti\Cardfraudsm\API;

use Ti\Cardfraudsm\API\Apiconfig;

class Geolation
{
    public function getCurrentClientLocation($ipaddress)
    {
        $apiobj =new Apiconfig();
        $ip = $ipaddress;
        $apibaseurl = $apiobj->GetApiBaseUrl();
        $apikey = $apiobj->GetApikey();
        $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key=0a1e22e6142dfba5a732359d9a764784');
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $data = curl_exec($ch);
        curl_close($ch);
        $api_result= json_decode($data,true);
        return  $api_result;
    }
}