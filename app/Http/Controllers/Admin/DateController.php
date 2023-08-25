<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Date;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = DB::table('schedules')
        ->join('dates', 'schedules.date_id', '=', 'dates.id')
        ->select('dates.id','date','schedules.start_schedule','schedules.end_schedule')
        ->get();

        return view('admin.dates.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


        return view('admin.dates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date' => 'required',
        ]);

        $date = Date::create(['date' => $request->date]);
        $idDate = $date->id;
        for ($i = 0; $i < count($request->input('times')); $i += 2) {
                $date->schedules()->create([
                    'start_schedule' => $request->input("times.$i"),
                    'end_schedule' => $request->input("times.".($i + 1)),
                    'date_id' => $idDate
            ]);
        }

        return redirect()->route('admin.dates.index')->with('info','Date created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Date $date)
    {
        //


        return view('admin.dates.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Date $date)
    {
        //


        return view('admin.dates.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Date $date)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Date $date)
    {
        //
    }
}
