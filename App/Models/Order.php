<?php
namespace Ti\Cardfraudsm\App\Models;
use Ti\Cardfraudsm\Telthemweb;



class Order extends Telthemweb{
    protected $fillable =[
        'ordernumber ',
        'customer_Id',
        'quantity',
        'total_amt',
        'ispaid'
     ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_Id','id');
    }
    public  function orderitems()
    {
        return $this->hasMany(Orderitem::class,'order_Id','id');
    }
    
}