<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class PdfMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Information';

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pdf Mailable',
        );
    }

    public function build()
    {
        $students = DB::table('students')
        ->join('schedule_student', 'students.id', '=', 'schedule_student.student_id')
        ->join('schedules', 'schedule_student.schedule_id', '=', 'schedules.id')
        ->join('dates', 'schedules.date_id', '=', 'dates.id')
        ->select('students.email', 'dates.date','schedules.start_schedule', 'schedules.end_schedule')
        ->get();
        $pdf = Pdf::loadView('admin.schedules.pdf'
        ,compact('students')
        );
        return $this->view('emails.informationpdf')
                    ->attachData($pdf->output(), 'admin.schedules.pdf');
    }
    


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
