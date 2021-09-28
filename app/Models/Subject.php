<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // get routine_group_Teachers
    public function routineGroupTeachers()
    {
        return $this->hasMany(RoutineGroupTeacher::class, 'subject_id', 'id');
    }

    // get classes
    public function classes()
    {
        return $this->belongsToMany(StudentClass::class, 'class_id', 'id');
    }
}
