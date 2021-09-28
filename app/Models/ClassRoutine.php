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
}
