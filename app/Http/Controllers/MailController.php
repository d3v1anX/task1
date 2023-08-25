<?php

namespace App\Http\Controllers;

use App\Mail\PdfMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index()
    {
        // pztejfhhkyccslhu apppassword google key

        $email = new PdfMailable;
        $studentEmails = DB::table('students')
        ->join('schedule_student', 'students.id', '=', 'schedule_student.student_id')
        ->join('schedules', 'schedule_student.schedule_id', '=', 'schedules.id')
        ->join('dates', 'schedules.date_id', '=', 'dates.id')
        ->select('students.email'
        // , 'dates.date', 'schedules.start_scheduled', 'schedules.end_schedule'
        )->get();

        $array = $studentEmails->toArray();

        $emails = array_map(function ($item) {
            return $item->email;
        }, $array);

        $unique_emails = array_unique($emails);

        $array = json_encode($unique_emails);;

        // return $array;
        // tengo una tabla students, una tabla schedules y una tabla dates, donde una date puede tener muchos schedules y cada student puede inscribirse en diferentes schedules osea que hay una relacion de muchos a muchos entre student y schedule, la tabla pivote entre estas dos tablas se llama schedule_student. Necesito una sentencia sql para usar en laravel que me traiga la informacion de todos los student por horario y fecha.
        Mail::to($studentEmails)->send($email);

        return redirect()->route('admin.schedules.index')->with('info', 'Email sended');
    }
}
