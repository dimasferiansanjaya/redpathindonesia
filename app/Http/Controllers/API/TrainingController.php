<?php

namespace App\Http\Controllers\API;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginationSize = request()->size;
        $trainings = Training::query();
        // ->whereYear('course_end', now()->year)       
        // ->whereMonth('course_end', now()->month);       
        if (request()->filled('filters')){
            $trainings = $trainings->where(
                request()->filters[0]['field'] , 
                request()->filters[0]['type'] , 
                '%'.request()->filters[0]['value'].'%'
            );
        }
        $trainings = $trainings->orderBy('course_end', 'desc')->paginate($paginationSize);
        return $trainings;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $training   = Training::query()->where('employee_id', $request->employeeId)->orderBy('course_end', 'desc')->get();
        $total      = $training->count();
        return response()->json([
            'total' => $total,
            'data' => $training
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
