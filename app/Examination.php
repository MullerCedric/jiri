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

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
