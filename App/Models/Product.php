<?php
namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Product extends Telthemweb{
    protected $fillable =[
        'category_Id',
        'name',
        'description',
        'price',
        'quantity',
        'expiry_date',
        'weight',
        'product_img'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_Id','id');
    }

     


    public  function orderitems()
    {
        return $this->hasMany(Orderitem::class,'product_Id','id');
    }
}