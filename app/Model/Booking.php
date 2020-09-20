<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     public function passenger()
     {
         return $this->belongsTo('App\Model\Passenger', 'passenger_id')->select('*');
     }

    public function customer()
    {
        return $this->belongsTo('App\Model\Customer', 'customer_id')->select('*');
    }

    public function airline()
    {
        return $this->belongsTo('App\Model\Airline', 'airlines_id')->select('*');
    }
    public function agency()
    {
        return $this->belongsTo('App\Model\Agency', 'agency_id')->select('*');
    }

    public function sector()
    {
        return $this->belongsTo('App\Model\Sector', 'sector_id')->select('*');
    }

    public function collection()
    {
        return $this->hasMany('App\Model\Collection','booking_id');
    }

    public function getTotalCollection()
    {
        return $this->collection()->sum('collection_amount');
    }




}
