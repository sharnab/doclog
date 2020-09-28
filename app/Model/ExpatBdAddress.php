<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatBdAddress extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'expat_bd_address';
    protected $guarded = ['id'];
    public function division()
    {
        return $this->belongsTo('App\Model\Division','division_id');
    }
    public function district()
    {
        return $this->belongsTo('App\Model\District','district_id');
    }
    public function cityCorporation()
    {
        return $this->belongsTo('App\Model\CityCorporation','city_corporation_id');
    }
    public function municipal()
    {
        return $this->belongsTo('App\Model\Municipal','municipal_id');
    }
    public function upazila()
    {
        return $this->belongsTo('App\Model\Upazila','upazila_id');
    }
    public function union()
    {
        return $this->belongsTo('App\Model\Union','union_id');
    }


}
