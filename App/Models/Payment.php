<?php
namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;
class Payment extends Telthemweb
{
    protected $fillable =[
        'paymentnumber',
        'order_Id',
        'customer_Id',
        'amount_paid',
        'paymentmode',
        'payment_referencecode'
    ];
    public  function customer()
    {
        return $this->belongsTo(Customer::class,'customer_Id','id');
    }

    public  function order()
    {
        return $this->belongsTo(Order::class,'order_Id','id');
    }
   
}