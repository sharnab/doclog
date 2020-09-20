<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class Union extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loc_unions';
    

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

    public static function getUnionId($titleEn){
        
        $upazilaId = DB::table('loc_unions')
            ->select('id')
            ->where('title_en',$titleEn)
            ->get();
        
        $queryCount = $upazilaId->count();
        if($queryCount > 0){
            return $upazilaId;
        } else {
            return false;
        }
    }

    protected $hidden = [];
}