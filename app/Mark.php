<?php

namespace jiri;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'examination_id', 'examiner_id', 'student_id', 'project_id', 'mark', 'type', 'comment',
    ];
}
