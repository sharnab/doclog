<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class TrainingCenter extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'training_center';

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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     "name",
    //     "short_name",
    //     "code",
    //     "email",
    //     "mobile",
    //     "address",
    //     "contact_person",
    //     "logo",
    //     "iata",
    //     "active_status",
    //     "remarks",
    //     "created_by",
    //     "updated_by"
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [];

}
