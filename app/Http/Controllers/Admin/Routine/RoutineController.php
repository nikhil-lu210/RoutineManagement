<?php

namespace App\Http\Controllers\Admin\Routine;

use App\Http\Controllers\Controller;
use App\Models\ClassRoutine;
use App\Models\Day;
use App\Models\Period;
use App\Models\RoutineGroup;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function __construct()
    {
    }
    

    public function index()
    {
        //
    }

    public function create()
    {
        $groups = RoutineGroup::select(['id', 'year_id', 'class_id', 'section_id'])
                            ->with([
                                'year' => function($year) {
                                    $year->select(['id', 'year']);
                                },
                                'studentClass' => function($class) {
                                    $class->select(['id', 'title', 'category']);
                                },
                                'section' => function($section) {
                                    $section->select(['id', 'title']);
                                },
                                'routineGroupTeacher' => function($teacher) {
                                    $teacher->select(['id', 'routine_group_id', 'subject_id', 'teacher_id'])
                                            ->with([
                                                'teacher' => function($info) {
                                                    $info->select(['id', 'name']);
                                                },
                                                'subject' => function($subject) {
                                                    $subject->select(['id', 'name']);
                                                }
                                            ]);
                                }
                            ])
                            ->get();
        $days = Day::select(['id', 'name'])->whereHoliday(false)->get();
        $periods = Period::select(['id', 'start', 'end'])->get();

        return response()->json([
            'groups' => $groups,
            'days' => $days,
            'periods' => $periods
        ], 200);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'routine_group' => [
                'required',
                'exists:routine_groups,id'
            ],
            'day' => [
                'required',
                'exists:days,id'
            ],
            'period' => [
                'nullable',
                'exists:periods,id'
            ],
        ]);

        $routine = ClassRoutine::create([
            'routine_group_id' => $request->routine_group,
            'day_id' => $request->day,
            'period_id' => $request->period
        ]);
        
        return response($routine);
    }
}
