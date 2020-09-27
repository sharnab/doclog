<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExpatSalaryInfo extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_salary_info';

   // protected $guarded = ['id'];
    protected $guarded = ['id'];

}
