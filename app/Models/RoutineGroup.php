<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoutineGroup extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // get class
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    // get section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    // get year
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    // get routine_group_students
    public function routineGroupStudents()
    {
        return $this->hasMany(RoutineGroupStudent::class, 'routine_group_id', 'id');
    }

    // get routine_group_Teacher
    public function routineGroupTeacher()
    {
        return $this->hasOne(RoutineGroupTeacher::class, 'routine_group_id', 'id');
    }

    // get classRoutines
    public function classRoutines()
    {
        return $this->hasMany(ClassRoutine::class, 'routine_group_id', 'id');
    }
}
