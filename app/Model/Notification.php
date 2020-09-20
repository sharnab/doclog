<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notification';

    public $timestamps = false ;
    
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'from_id',
    	'to_id',
    	'notification_type',
    	'read_status',
    	'entry_time',
    	'message',
        'ref_id',
        'title',
        'entry_date'
    ];
/*
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function assetType()
    {
        return $this->belongsTo('App\Model\AssetType', 'asset_type_id') ;
    }

    public function deviceInfo()
    {
        return $this->belongsTo('App\Model\DeviceStock', 'device_id','device_id') ;
    }*/
    
}
