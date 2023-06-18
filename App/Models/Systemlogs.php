<?php

namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;


class Systemlogs extends Telthemweb
{
    protected $fillable =[
        'administrator_id',
        'timein',
        'ipaddress',
        'geolocationap',
        'useaccountname',
        'timeout',
    ];


    public  function admin()
    {
        return $this->belongsTo(Administrator::class,'administrator_id','id');
    }
}