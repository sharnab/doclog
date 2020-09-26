<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;

class Passport extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expat_passport';

    protected $guarded = ['id'];

    protected $hidden = [];

}
