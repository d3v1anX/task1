<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DateController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Mail\PdfMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

Route::get('', [HomeController::class,'index'])->name('admin.home');
Route::resource('dates', DateController::class)->names('admin.dates');
Route::resource('students', StudentController::class)->names('admin.students');
Route::get('schedules/pdf', [ScheduleController::class,'pdf'])->name('admin.schedules.pdf');
Route::resource('schedules', ScheduleController::class)->names('admin.schedules');
Route::get('/emails',[MailController::class,'index'])->name('emails.pdf');