<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'expat_feedback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "expat_id",
        "feedback",
        "active_status",
        "created_by",
        "updated_by"
    ];

    public function expat()
    {
        return $this->belongsTo('App\Model\Expat', 'expat_id')->select('*');
    }

}
