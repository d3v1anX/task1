<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Date;
use App\Models\Student;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::paginate(5);
        $dates = Date::all();

        return view('admin.students.index', compact(['students','dates']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $schedules = DB::table('schedules')
            ->join('dates', 'schedules.date_id', '=', 'dates.id')
            ->select('schedules.id', 'dates.date', 'schedules.start_schedule', 'schedules.end_schedule')->get();

        $pluckSchedules = $schedules->map(function ($schedule) {
            return $schedule->date . ' - ' . $schedule->start_schedule . ' - ' . $schedule->end_schedule;
        })->all();

        // return $schedules;
        return view('admin.students.create', compact('schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name_student' => 'required',
            'lastname_student' => 'required',
            'email' => 'required | unique:students,email',
            'checked' => 'required',
        ]);


        $student = Student::create([
            'name_student' => $request->name_student,
            'lastname_student' => $request->lastname_student, 'email' => $request->email
        ]);
        
        $arrInt = array_map('intval', $request->checked);
        $student->schedules()->attach($arrInt);

        return redirect()->route('admin.students.index')->with('info', 'Student has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //



        return view('admin.students.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //



        return view('admin.students.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
