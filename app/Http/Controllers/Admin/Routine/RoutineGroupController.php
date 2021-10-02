<?php

namespace App\Http\Controllers\Admin\Routine;

use App\Http\Controllers\Controller;
use App\Models\RoutineGroup;
use App\Models\Section;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Http\Request;

class RoutineGroupController extends Controller
{
    public function __construct()
    {
    }
    

    public function index()
    {
        $groups = RoutineGroup::with([
                                'year' => function($year) {
                                    $year->select(['id', 'year']);
                                },
                                'studentClass' => function($class) {
                                    $class->select(['id', 'title', 'category']);
                                },
                                'section' => function($section) {
                                    $section->select(['id', 'title']);
                                }
                            ])
                            ->get()
                            ->groupBy([function ($val) {
                                return $val->year->year;
                            }, function ($val) {
                                return $val->studentClass->title;
                            }]);

        $years = Year::select(['id', 'year'])->where('year', '>=', date('Y'))->get();
        $classes = StudentClass::select(['id', 'title', 'category'])->get();
        $sections = Section::select(['id', 'title'])->get();

        return response()->json([
            'groups' => $groups,
            'years' => $years,
            'classes' => $classes,
            'sections' => $sections
        ], 200);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'year' => [
                'required',
                'exists:years,id'
            ],
            'class' => [
                'required',
                'exists:student_classes,id'
            ],
            'section' => [
                'nullable',
                'exists:sections,id'
            ],
        ]);

        // if (RoutineGroup::where('year_id', '=', ($request->year)->exists())) {
        //     if (RoutineGroup::where('class_id', '=', ($request->class)->exists())) {
        //         $request->validate([
        //             'section' => [
        //                 'nullable',
        //                 'exists:sections,id'
        //             ],
        //         ]);
        //     }
        // }
        
        $group = new RoutineGroup();

        $group->year_id = $request->year;
        $group->class_id = $request->class;
        $group->section_id = $request->section;

        $group->save();
        
        return response($group);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => [
                'required',
                'exists:years,id'
            ],
            'class' => [
                'required',
                'exists:student_classes,id'
            ],
            'section' => [
                'nullable',
                'exists:sections,id'
            ],
        ]);
        
        $group = RoutineGroup::whereId($id)->firstOrFail();

        $group->year_id = $request->year;
        $group->class_id = $request->class;
        $group->section_id = $request->section;

        $group->save();
        
        return response($group);
    }
}
