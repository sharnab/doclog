<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class SplashScreen extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_splash_screen';

    protected $guarded = ['id'];
    public static function getSequencelist(){
        
        $sScreen = DB::table('app_splash_screen')
                    ->select('display_sequence')
                    //->where('active_status',1)
                    ->get();
        
        $queryCount = $sScreen->count();
        if($queryCount > 0){
            return $sScreen;
        } else {
            return false;
        }
    }

    protected $hidden = [];
}