<?php

namespace App\Http\Controllers\Admin\Routine;

use App\Models\User;
use App\Models\Year;
use App\Models\Section;
use App\Models\Subject;
use App\Models\RoutineGroup;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RoutineGroupTeacher;
use App\Http\Controllers\Controller;

class GroupTeacherController extends Controller
{
    public function __construct()
    {
    }
    

    public function index()
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
                                }
                            ])
                            ->get();

        $subjects = Subject::select(['id', 'name'])->get();
        $teachers = User::select(['id', 'name'])->whereRole('teacher')->get();

        $teacher_groups = RoutineGroupTeacher::select(['id', 'routine_group_id', 'teacher_id', 'subject_id'])
                                            ->with([
                                                'routineGroup' => function($query) {
                                                    $query->select(['id', 'year_id', 'class_id', 'section_id'])
                                                          ->with([
                                                                'year' => function($year) {
                                                                    $year->select(['id', 'year']);
                                                                },
                                                                'studentClass' => function($class) {
                                                                    $class->select(['id', 'title', 'category']);
                                                                },
                                                                'section' => function($section) {
                                                                    $section->select(['id', 'title']);
                                                                }
                                                            ]);
                                                },
                                                'teacher' => function($query) {
                                                    $query->select(['id', 'name']);
                                                },
                                                'subject' => function($query) {
                                                    $query->select(['id', 'name']);
                                                }
                                            ])->get();

        // dd($groups[0]->year);

        return response()->json([
            'teacher_groups' => $teacher_groups,
            'groups' => $groups,
            'subjects' => $subjects,
            'teachers' => $teachers
        ], 200);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'routine_group' => [
                'required',
                'exists:routine_groups,id',
            ],
            'teacher' => [
                'required',
                'exists:users,id'
            ],
            'subject' => [
                'nullable',
                'exists:subjects,id'
            ]
        ]);
        
        $teacher = new RoutineGroupTeacher();

        $teacher->routine_group_id = $request->routine_group;
        $teacher->teacher_id = $request->teacher;
        $teacher->subject_id = $request->subject;

        $teacher->save();
        
        return response($teacher);
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'routine_group' => [
                'required',
                'exists:routine_groups,id'
            ],
            'teacher' => [
                'required',
                'exists:users,id'
            ],
            'subject' => [
                'nullable',
                'exists:subjects,id'
            ],
        ]);
        
        $teacher = RoutineGroupTeacher::whereId($id)->firstOrFail();

        $teacher->routine_group_id = $request->routine_group;
        $teacher->teacher_id = $request->teacher;
        $teacher->subject_id = $request->subject;

        $teacher->save();
        
        return response($teacher);
    }
}
