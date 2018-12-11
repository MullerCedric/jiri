<?php

namespace jiri;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'examination_id', 'apply_for_user', 'weighting',
    ];
}
