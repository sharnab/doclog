<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $table = "customer_type";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'active_status',
        'created_by',
        'updated_by',
    ];



}
