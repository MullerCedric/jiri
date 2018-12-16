<?php

namespace jiri;

use Illuminate\Database\Eloquent\Model;

class Weighting extends Model
{
    public function applyFor() {
        return $this->belongsTo(User::class, 'apply_for_user');
    }
    public function project() {
        return $this->belongsTo(Project::class);
    }
}
