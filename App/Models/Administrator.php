<?php

namespace Ti\Cardfraudsm\App\Models;
use Ti\Cardfraudsm\Telthemweb;
use Spatie\Permission\Traits\HasRoles;

class Administrator extends Telthemweb
{
    use HasRoles;
    protected $fillable = [
        'role_Id',
        'name',
        'surname',
        'username',
        'password',
        'email',
        'phone',
        'gender',
        'city',
        'address',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public  function role()
    {
        return $this->belongsTo(Role::class,'role_Id','id');
    }

    public function audits()
    {
        return $this->hasMany(Audit::class,'administrator_id','id');
    }

    public function logs()
    {
        return $this->hasMany(Systemlogs::class,'administrator_id','id');
    }
}