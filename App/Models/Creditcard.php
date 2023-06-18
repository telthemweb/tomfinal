<?php

namespace Ti\Cardfraudsm\App\Models;
use Ti\Cardfraudsm\Telthemweb;

class Creditcard extends Telthemweb
{
    protected $fillable = [
        'customer_Id',
        'name',
        'account_Id',
        'ac_number',
        'cvv',
        'expiry_date',
        'pin',
        'bank'
    ];

    public function alerts()
    {
        return $this->hasMany(Alert::class,'customer_Id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_Id','id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class,'account_Id','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'creditcard_Id','id');
    }

}