<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class CityCorporation extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loc_city_corporations';

    protected $guarded = ['id'];

    public static function getDistrictList(){
        
        $division = DB::table('loc_districts')
                    ->select('*')
                    ->where('active_status',1)
                    ->get();
        
        $queryCount = $division->count();
        if($queryCount > 0){
            return $division;
        } else {
            return false;
        }
    }

    public static function getCityCoId($titleEn){
        
        $citycoId = DB::table('loc_city_corporations')
            ->select('id')
            ->where('title_en',$titleEn)
            ->get();
        
        $queryCount = $citycoId->count();
        if($queryCount > 0){
            return $citycoId;
        } else {
            return false;
        }
    }

    protected $hidden = [];
}