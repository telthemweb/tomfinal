<?php

namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Audit extends Telthemweb
{

   
    protected $fillable =[
        'administrator_id',
        'entity',
        'oldvalue',
        'newvalue',
        'action',
    ];
  

    public  function admin()
    {
        return $this->belongsTo(Administrator::class,'administrator_id','id');
    }
}