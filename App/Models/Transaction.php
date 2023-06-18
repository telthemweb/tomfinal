<?php
namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Transaction extends Telthemweb{
    protected $fillable =[
        'customer_Id',
        'account_Id',
        'creditcard_Id',
        'amount',
        'country',
        'city',
        'ipaddress',
        'timetransaction',	
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_Id','id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class,'account_Id','id');
    }

    public function creditcard()
    {
        return $this->belongsTo(Creditcard::class,'creditcard_Id','id');
    }
}





