<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class Upazila extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loc_upazilas';

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

    public static function getUpazilaId($titleEn){
        
        $upazilaId = DB::table('loc_upazilas')
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