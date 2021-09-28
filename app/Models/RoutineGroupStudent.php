<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoutineGroupStudent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // get routine_group
    public function routineGroup()
    {
        return $this->belongsTo(RoutineGroup::class, 'routine_group_id', 'id');
    }

    // get student
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
