<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';
    protected $guarded = [];

    public function booking()
    {
        return $this->belongsTo('App\Model\Booking', 'booking_id')->select('id','invoice_number');
    }
}
