<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentSource extends Model
{
    protected $table = 'payment_sources';
    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function paymentType()
    {
        return $this->belongsTo('App\Model\PaymentType', 'payment_type_id')->select('id','name', 'remarks');
    }
}
