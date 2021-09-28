<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // get routine_groups
    public function routineGroups()
    {
        return $this->hasMany(RoutineGroup::class, 'class_id', 'id');
    }

    // get subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_id', 'id');
    }
}
