<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Period;

class PeriodController extends Controller
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
        $periods = Period::select(['id', 'start', 'end'])->get();
        return response()->json($periods, 200);
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
            'start' => ['required', 'unique:periods,start', 'date_format:H:i'],
            'end' => [
                'required',
                'unique:periods,end',
                'date_format:H:i', 
                function($attribute, $value, $fail) {
                    if($value <= request()->start){
                        return $fail('Class end time should not be less then class start date.');
                    }
                }
            ]
        ],
        [
            'start.unique' => 'Class Start Time Already Registered',
            'end.unique' => 'Class End Time Already Registered',
        ]);

        $period = new Period();

        $period->start = $request->start;
        $period->end = $request->end;
        $period->save();
        
        return response($period);
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

        $period = Period::whereId($id)->firstOrFail();

        if($period->start != $request->start) {
            $request->validate([
                'start' => ['required', 'unique:periods,start', 'date_format:H:i']
            ],
            [
                'start.unique' => 'Class Start Time Already Registered'
            ]);
        }

        if($period->end != $request->end) {
            $request->validate([
                'end' => [
                    'required',
                    'unique:periods,end',
                    'date_format:H:i', 
                    function($attribute, $value, $fail) {
                        if($value <= request()->start){
                            return $fail('Class end time should not be less then class start date.');
                        }
                    }
                ]
            ],
            [
                'end.unique' => 'Class End Time Already Registered'
            ]);
        }

        $period->start = $request->start;
        $period->end = $request->end;
        $period->save();
        
        return response($period);
    }
}
