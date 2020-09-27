<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatEmploymentType extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_employment_type';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
