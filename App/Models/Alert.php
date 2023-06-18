<?php

namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Alert extends Telthemweb
{
    protected $fillable =[
        'creditcard_Id',
        'customer_Id',
        'amount'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_Id','id');
    }

    public function creditcard()
    {
        return $this->belongsTo(Creditcard::class,'creditcard_Id','id');
    }
}	