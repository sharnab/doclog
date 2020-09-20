<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'religion';

    protected $guarded = ['id'];

    protected $hidden = [];
}