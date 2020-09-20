<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "code",
        "discount_type",
        "amount",
        "applicable_for",
        "reference_id",
        "from_date",
        "to_date",
        "active_status",
        "created_by",
        "updated_by"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function Customer()
     {
         return $this->belongsTo('App\Model\Customer', 'reference_id')->select('id','given_name');
     }
}
