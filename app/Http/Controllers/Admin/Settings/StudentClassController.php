<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\StudentClass as StdClass;

class StudentClassController extends Controller
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
        $classes = StdClass::select(['id', 'title', 'category'])->get();
        return response()->json($classes, 200);
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
            'title' => ['required', 'string'],
            'category'=>[
                'nullable',
                 Rule::in([
                    'boys',
                    'girls'
                ]),
             ],
        ]);

        $class = new StdClass();

        $class->title = $request->title;
        $class->category = $request->category;

        $class->save();
        
        return response($class);
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
        // dd($request->all(), $id);
        $request->validate([
            'title' => ['required', 'string'],
            'category'=>[
                'nullable',
                 Rule::in([
                    'boys',
                    'girls'
                ]),
             ],
        ]);

        $class = StdClass::whereId($id)->firstOrFail();

        $class->title = $request->title;
        $class->category = $request->category;

        $class->save();
        
        return response($class);
    }
}
