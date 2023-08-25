<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleStudent extends Model
{
    use HasFactory;

    protected $table = 'schedule_student';
    // protected $fillable = ['schedule_id','student_id','created_at','updated_at'];
}
