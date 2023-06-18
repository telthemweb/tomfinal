<?php

namespace Ti\Cardfraudsm\App\Models;
use Ti\Cardfraudsm\Telthemweb;
use Spatie\Permission\Traits\HasRoles;

class Account extends Telthemweb
{
    protected $fillable = [
        'customer_Id',
        'accountnumber',
        'balance',
        'balance_limit',
        'branchname',
        'bank',
        'location',
        'country'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function creditcard()
    {
        return $this->hasOne(Creditcard::class,'account_Id','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'account_Id','id');
    }
}