<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatRecruitingAgency extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_recruiting_agency';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
