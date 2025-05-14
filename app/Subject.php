<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = [
        'name','credit','day','startime','endtime','teacher_id','classroom_id','program_id'
    ];
  
      public function classroom()
    {
        return $this->belongsTo(Classroom::class);
        
    }

      public function teacher()
    {
        return $this->belongsTo(Teacher::class);
        
    }

     public function absences()
    {
        return $this->hasMany(Absence::class);
    }

      public function program()
    {
        return $this->belongsTo(Program::class);
        
    }

      public function tests()
    {
        return $this->hasMany(Test::class);
    }

      public function homeworks()
    {
        return $this->hasMany(Homework::class);
        
    }

      public function questions()
    {
        return $this->hasMany(Question::class);
        
    }

      public function calendars()
    {
        return $this->hasMany(Calendar::class);
        
    }


      public function subjectavgs()
    {
        return $this->hasMany(Subjectavg::class);
    }

      public function marks()
    {
        return $this->hasMany(Mark::class);
        
    }

      public function cahiers ()
    {
        return $this->hasMany(Cahier::class);
    }

        public function semesters()
    {
        return $this->belongsToMany(Semester::class);
    }

}
