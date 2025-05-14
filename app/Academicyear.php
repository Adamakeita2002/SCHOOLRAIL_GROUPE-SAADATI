<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academicyear extends Model
{

    protected $fillable = [
        'labelYear','labelSemester','state','startDate','endDate','startYear','endYear'
    ];

      public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

      public function tests ()
    {
        return $this->hasMany(Test::class);
    }

      public function actualities ()
    {
        return $this->hasMany(Actuality::class);
    }

      public function questions ()
    {
        return $this->hasMany(Question::class);
    }


      public function ahomeworks ()
    {
        return $this->hasMany(Ahomework::class);
    }

      public function forums ()
    {
        return $this->hasMany(Forum::class);
    }

      public function annualavgs ()
    {
        return $this->hasMany(Annualavg::class);
    }

      public function semesters ()
    {
        return $this->hasMany(Semester::class);
    }

          public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
