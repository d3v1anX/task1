<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = DB::table('dates')
            ->join('schedules', 'dates.id', '=', 'schedules.date_id')
            ->select('schedules.id', 'dates.date', 'schedules.start_schedule', 'schedules.end_schedule')->paginate(4);

        $students = Student::paginate(4);

        return view('admin.schedules.index', compact(['schedules', 'students']));
    }

    public function pdf()
    {
        $students = DB::table('students')
            ->join('schedule_student', 'students.id', '=', 'schedule_student.student_id')
            ->join('schedules', 'schedule_student.schedule_id', '=', 'schedules.id')
            ->join('dates', 'schedules.date_id', '=', 'dates.id')
            ->select('students.email', 'dates.date', 'schedules.start_schedule', 'schedules.end_schedule')
            ->get();

        $pdf = Pdf::loadView('admin.schedules.pdf', compact('students'));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //


        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //


        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
