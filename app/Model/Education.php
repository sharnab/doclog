<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class Education extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'educational_institute';

    protected $guarded = ['id'];
    
    public static function getInsId($titleEn){
        
        $insId = DB::table('educational_institute')
            ->select('id')
            ->where('institute_name',$titleEn)
            ->get();
        
        $queryCount = $insId->count();
        if($queryCount > 0){
            return $insId;
        } else {
            return false;
        }
    }
    protected $hidden = [];
}