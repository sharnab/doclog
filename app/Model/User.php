<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    
    protected $fillable = [
        'full_name',
        'username',
        'password',
        'gender',
        'email',
        'contact_no',
        'sys_group_id',
        'created_by',
        'updated_by',
        'customer_id',
        'is_first_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $remember_token=false;

    public function userGroup()
    {
        return $this->belongsTo('App\Model\Role\SysUserGroup', 'sys_group_id')->select('id','name');
    }

    public function company()
    {
        return $this->hasMany( 'App\Model\UserCompany','user_id','id');
    }
}
