<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DayController extends Controller
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
        $days = Day::select(['id', 'name', 'holiday'])->get();
        // dd($days);
        return response()->json($days, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:days,name',
                Rule::in([
                    'Saturday', 
                    'Sunday', 
                    'Monday', 
                    'Tuesday', 
                    'Wednesday', 
                    'Thursday', 
                    'Friday'
                ])
            ],
            'holiday' => [
                'nullable', 
                'boolean'
            ]
        ]);

        $day = new Day();

        $day->name = $request->name;
        $day->holiday = ($request->holiday == true) ? true : false;
        $day->save();
        
        return response($day);
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
            'name' => [
                'required',
                'string',
                Rule::in([
                    'Saturday', 
                    'Sunday', 
                    'Monday', 
                    'Tuesday', 
                    'Wednesday', 
                    'Thursday', 
                    'Friday'
                ])
            ],
            'holiday' => [
                'nullable', 
                'boolean'
            ]
        ]);

        $day = Day::whereId($id)->firstOrFail();
        
        if($day->name != $request->name) {
            $request->validate([
                'name' => [
                    'unique:days,name',
                ]
            ]);
        }

        $day->name = $request->name;
        $day->holiday = ($request->holiday == true) ? true : false;
        $day->save();
        
        return response($day);
    }
}
