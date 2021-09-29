<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
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
        $students = Student::select(['id', 'student_id', 'mobile'])
                            ->with(['student' => function ($user) {
                                $user->select(['id', 'name', 'email']);
                            }])
                            ->get();
        
        return response()->json($students, 200);
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
            'role' => 'student',
            'password' => Hash::make($request->password),
        ]);

        $student = $user->student;
        if (is_null($student)) {
            $student = new Student();
            $student->student_id = $user->id;
            $student->mobile = $request->mobile;
        }

        $student->save();
        
        return response($student);
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::select(['id', 'student_id', 'mobile'])
                            ->whereId($id)
                            ->with(['student' => function ($user) {
                                $user->select(['id', 'name', 'email']);
                            }])
                            ->firstOrFail();

        return response()->json($student, 200);
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
