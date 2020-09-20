<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class District extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loc_districts';

    protected $guarded = ['id'];

    public static function getDivisionList(){
        
        $division = DB::table('loc_divisions')
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

    public static function getDistId($titleEn){
        
        $distId = DB::table('loc_districts')
            ->select('id')
            ->where('title_en',$titleEn)
            ->get();
        
        $queryCount = $distId->count();
        if($queryCount > 0){
            return $distId;
        } else {
            return false;
        }
    }

    protected $hidden = [];
}