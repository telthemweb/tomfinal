<?php
namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Cart extends Telthemweb{
    protected $fillable =[
        'product_Id',
        'customer_Id',
        'quantity'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_Id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_Id','id');
    }
}