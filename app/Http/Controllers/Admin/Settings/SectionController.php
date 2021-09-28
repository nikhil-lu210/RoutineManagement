<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Subject;

class SectionController extends Controller
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
        $sections = Section::select(['id', 'title'])->get();
        return response()->json($sections, 200);
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
            'title' => ['required', 'string', 'unique:sections,title'],
        ]);

        $section = new Section();

        $section->title = $request->title;
        $section->save();
        
        return response($section);
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
            'title' => ['required', 'string', 'unique:sections,title'],
        ]);

        $subject = Section::whereId($id)->firstOrFail();

        $subject->title = $request->title;
        $subject->save();
        
        return response($subject);
    }
}
