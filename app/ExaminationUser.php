<?php

namespace jiri;

use Illuminate\Database\Eloquent\Model;

class ExaminationUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'examination_user';
    protected $fillable = [
        'examination_id', 'user_id', 'role',
    ];
}
