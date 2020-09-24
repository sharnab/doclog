<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gender';

    protected $guarded = ['id'];

    protected $hidden = [];
}
