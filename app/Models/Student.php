<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

      protected $table = 'students';
      protected $fillable = ['name_student','lastname_student','email'];

      //Many to Many relationship
      public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
}
