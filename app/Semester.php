<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model

{

        protected $fillable = [
        'label','level','startDate','endDate','state','arretDesNotes','academicyear_id',
    ];

	/*
      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }
    */

      public function semesteravgs()
    {
        return $this->hasMany(Semesteravg::class);
        
    }

      public function academicyear()
    {
        return $this->belongsTo(Academicyear::class);
        
    }

          public function subjectavgs()
    {
        return $this->hasMany(Subjectavg::class);
        
    }

          public function marks()
    {
        return $this->hasMany(Mark::class);
        
    }

        public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

}
