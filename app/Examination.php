<?php

namespace jiri;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_time', 'is_draft', 'is_happening',
    ];

    public function manager() {
        return $this->belongsTo(User::class, 'manager_id');
    }
    public function participants() {
        return $this->belongsToMany(User::class)
            ->orderBy('name', 'ASC');
    }
    public function examiners() {
        return $this->belongsToMany(User::class)
            ->whereRole('examiner')
            ->orderBy('name', 'ASC');
    }
    public function students() {
        return $this->belongsToMany(User::class)
            ->whereRole( 'student')
            ->orderBy('name', 'ASC');
    }
    public function projects() {
        return $this->hasMany(Project::class);
    }
}
