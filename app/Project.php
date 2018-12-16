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

    public function examination() {
        return $this->belongsTo(Examination::class);
    }
    public function weightings() {
        return $this->hasMany(Weighting::class);
    }
    public function marks() {
        return $this->hasMany(Mark::class);
    }
}
