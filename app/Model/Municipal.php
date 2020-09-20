<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class Municipal extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loc_municipals';
    

    protected $guarded = ['id'];

    public static function getDistrictList(){
        
        $district = DB::table('loc_districts')
                    ->select('*')
                    ->where('active_status',1)
                    ->get();
        
        $queryCount = $district->count();
        if($queryCount > 0){
            return $district;
        } else {
            return false;
        }
    }

    public static function getUpazilaList(){
        
        $upazila = DB::table('loc_upazilas')
                    ->select('*')
                    ->where('active_status',1)
                    ->get();
        
        $queryCount = $upazila->count();
        if($queryCount > 0){
            return $upazila;
        } else {
            return false;
        }
    }

    public static function getMunicipalId($titleEn){
        
        $municipalId = DB::table('loc_municipals')
            ->select('id')
            ->where('title_en',$titleEn)
            ->get();
        
        $queryCount = $municipalId->count();
        if($queryCount > 0){
            return $municipalId;
        } else {
            return false;
        }
    }

    protected $hidden = [];
}