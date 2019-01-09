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
    protected $casts = [
        'mark' => 'float',
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

    public function scopeFromAnExaminationManagedByCurrentUser($query)
    {
        $currentManagedExaminations = \jiri\User::find(auth()->id())->currentManagedExaminations()->get();
        $idOfCurrentExaminationsManagedByCurrentUser = [];
        foreach ($currentManagedExaminations as $examination) {
            $idOfCurrentExaminationsManagedByCurrentUser[] = $examination->id;
        }
        return $query->whereIn('examination_id', $idOfCurrentExaminationsManagedByCurrentUser);
    }
}
