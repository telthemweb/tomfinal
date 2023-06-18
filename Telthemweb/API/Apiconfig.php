<?php
namespace Ti\Cardfraudsm\API;

class Apiconfig{

    public function GetApiBaseUrl():string
    {
        $apibaseurl="http://api.ipstack.com/";
        return $apibaseurl;
    }

    public function GetApikey():string
    {
        $apikey="0a1e22e6142dfba5a732359da764784";
        return $apikey;
    }

}