<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loc_divisions';

    protected $guarded = ['id'];

    protected $hidden = [];
}