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
    

    public function latestRoutine()
    {
        $latestYear = date('Y');

        $routine = ClassRoutine::with([
                                    'routineGroup' => function ($query) {
                                        $query->with(['year', 'studentClass', 'section']);
                                    },
                                    'day',
                                    'period',
                                    'classTeacher' => function($query) {
                                        $query->with(['subject', 'teacher']);
                                    }
                                ])
                                ->whereHas('routineGroup.year', function ($builder) use ($latestYear) {
                                    $builder->where('year', $latestYear);
                                })
                                ->get()
                                ->groupBy(function($val) {
                                    $section = (!is_null($val->routineGroup->section)) ? '('. $val->routineGroup->section->title.')' : null;
                                    return $val->routineGroup->studentClass->title.' '.$val->routineGroup->studentClass->category.$section;
                                });
        $groups = [];
        foreach($routine as $key => $group) {
            $groups[$key] = $group->groupBy(function ($val) {
                return $val->day->name;
            });
        }
        return response()->json($groups);
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
                                'routineGroupTeachers' => function($teacher) {
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
                'required',
                'exists:periods,id'
            ],
            'subject' => [
                'required',
                'exists:routine_group_teachers,id'
            ],
        ]);

        $routine = ClassRoutine::create([
            'routine_group_id' => $request->routine_group,
            'day_id' => $request->day,
            'period_id' => $request->period,
            'routine_group_teacher_id' => $request->subject
        ]);
        
        return response($routine);
    }

    public function update(Request $request, $routine_id)
    {
        // return response($request, $routine_id);
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
                'required',
                'exists:periods,id'
            ],
            'subject' => [
                'required',
                'exists:routine_group_teachers,id'
            ],
        ]);

        $routine = ClassRoutine::whereId($routine_id)->firstOrFail();
        
        $routine->routine_group_id = $request->routine_group;
        $routine->day_id = $request->day;
        $routine->period_id = $request->period;
        $routine->routine_group_teacher_id = $request->subject;

        $routine->save();
        
        return response($routine);
    }
}
