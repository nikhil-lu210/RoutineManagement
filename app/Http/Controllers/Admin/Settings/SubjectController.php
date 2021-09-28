<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectController extends Controller
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
        $subjects = Subject::select(['id', 'name'])->get();
        return response()->json($subjects, 200);
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
            'name' => ['required', 'string', 'unique:subjects,name'],
        ]);

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->save();
        
        return response($subject);
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
        $request->validate([
            'name' => ['required', 'string', 'unique:subjects,name'],
        ]);

        $subject = Subject::whereId($id)->firstOrFail();

        $subject->name = $request->name;
        $subject->save();
        
        return response($subject);
    }
}
