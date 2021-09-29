<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::select(['id', 'teacher_id', 'mobile'])
                            ->with(['teacher' => function ($user) {
                                $user->select(['id', 'name', 'email']);
                            }])
                            ->get();
        
        return response()->json($teachers, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'string'],
            'mobile' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'teacher',
            'password' => Hash::make($request->password),
        ]);

        $teacher = $user->teacher;
        if (is_null($teacher)) {
            $teacher = new Teacher();
            $teacher->teacher_id = $user->id;
            $teacher->mobile = $request->mobile;
        }

        $teacher->save();
        
        return response($teacher);
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::select(['id', 'teacher_id', 'mobile'])
                            ->whereId($id)
                            ->with(['teacher' => function ($user) {
                                $user->select(['id', 'name', 'email']);
                            }])
                            ->firstOrFail();

        return response()->json($teacher, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
    }
}
