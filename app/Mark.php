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


    public function examination() {
        return $this->belongsTo(Examination::class);
    }
    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function givenTo() {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function givenBy() {
        return $this->belongsTo(User::class, 'examiner_id');
    }
}
