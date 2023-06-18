<?php
namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Customer extends Telthemweb{
    protected $fillable =[
        'name',
        'surname',
        'password',
        'email',
        'phone',
        'gender',
        'province',
        'district',
        'country',
        'district',
        'city',
        'address'	
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'customer_Id','id');
    }

    public  function accounts()
    {
        return $this->hasMany(Account::class,'customer_id','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'customer_Id','id');
    }
}