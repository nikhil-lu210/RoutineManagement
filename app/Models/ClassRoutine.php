<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoutine extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'routine_group_id',
        'day_id',
        'period_id',
        'routine_group_teacher_id'
    ];

    // get day
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }

    // get period
    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id', 'id');
    }

    // get routineGroup
    public function routineGroup()
    {
        return $this->belongsTo(RoutineGroup::class, 'routine_group_id', 'id');
    }

    // get classTeacher
    public function classTeacher()
    {
        return $this->belongsTo(RoutineGroupTeacher::class, 'routine_group_teacher_id', 'id');
    }
}
