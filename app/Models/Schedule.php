<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['start_schedule', 'end_schedule'];
    protected $table = 'schedules';

    //One to Many relationship inverse
    public function date(){
        return $this->belongsTo(Date::class);
    } 

    //Many to Many relationship
    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
