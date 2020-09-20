<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    protected $guarded = ['id'];
    protected $fillable = [
        "title",
        "title_bn",
        "display_sequence",
        "remarks",
        "parent_id",
        "active_status",
        "created_by",
        "updated_by"
    ];
    protected $hidden = [];
}