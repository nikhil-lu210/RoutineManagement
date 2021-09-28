<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Year;

class YearController extends Controller
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
        $years = Year::select(['id', 'year'])->get();
        return response()->json($years, 200);
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
            'year' => ['required', 'integer', 'unique:years,year'],
        ]);

        $year = new Year();

        $year->year = $request->year;
        $year->save();
        
        return response($year);
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
            'year' => ['required', 'integer', 'unique:years,year'],
        ]);

        $year = Year::whereId($id)->firstOrFail();

        $year->year = $request->year;
        $year->save();
        
        return response($year);
    }
}
