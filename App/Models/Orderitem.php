<?php
namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Orderitem extends Telthemweb{
    protected $fillable =[
        'order_Id',
        'quantity',
        'product_Id',
        'price'
     ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_Id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_Id','id');
    }
}