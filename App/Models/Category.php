<?php
namespace Ti\Cardfraudsm\App\Models;

use Ti\Cardfraudsm\Telthemweb;

class Category extends Telthemweb{
    protected $fillable =[
        'name'
    ];

    public  function products()
    {
        return $this->hasMany(Product::class,'category_Id','id');
    }
}