<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class AccountInfo extends Model
{
    protected $table = 'account_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "customer_id",
        "account_name",
        "TIN",
        "account_no",
        "bank_id",
        "branch_id",
        "currency",
        "active_status",
        "created_by",
        "created_at"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     public function Customer()
     {
         return $this->belongsTo('App\Model\Customer', 'customer_id')->select('id','given_name');
     }

     public function Bank()
     {
         return $this->belongsTo('App\Model\Bank', 'bank_id')->select('id','name');
     }

     public function Branch()
     {
         return $this->belongsTo('App\Model\Branch', 'branch_id')->select('id','name');
     }

}
