<?php

namespace jiri;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'is_active', 'avatar_url', 'portfolio_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function allExaminations() {
        return $this->belongsToMany(Examination::class);
    }
    public function isManaging() {
        return $this->hasMany(Examination::class, 'manager_id');
    }
    public function weightings() {
        return $this->hasMany(Weighting::class, 'apply_for_user');
    }
    public function receivedMarks() {
        return $this->hasMany(Mark::class, 'student_id');
    }
    public function givenMarks() {
        return $this->hasMany(Mark::class, 'examiner_id');
    }
}
