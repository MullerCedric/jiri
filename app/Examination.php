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
        'name', 'starting_at', 'is_draft', 'is_happening',
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

    public function scopeHasHappened($query)
    {
        return $query->where('is_happening', '=', false)
            ->whereDate('starting_at', '<', date('Y-m-d H:i:s'))
            ->orderBy('starting_at', 'DESC');
    }
    public function scopeHasNotYetHappened($query)
    {
        return $query->where('is_happening', '=', false)
            ->whereDate('starting_at', '>', date('Y-m-d H:i:s'))
            ->orderBy('starting_at', 'ASC');
    }
    public function scopeIsHappening($query)
    {
        return $query->where('is_happening', '=', true);
    }
}
