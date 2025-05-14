<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

     protected $fillable = [
        'name','level','code','program_id','academicyear_id','annualAvg','semesterAvg','timetable'
    ];

      public function ressources()
    {
        return $this->belongsToMany(Ressource::class);
        
    }

      public function subjects()
    {
        return $this->hasMany(Subject::class);
        
    }

      public function subjectavgs()
    {
        return $this->hasMany(Subjectavg::class);
        
    }


      public function semesteravgs()
    {
        return $this->hasMany(Semesteravg::class);
        
    }


      public function annualavgs()
    {
        return $this->hasMany(Annualavg::class);
        
    }


      public function academicyear ()
    {
        return $this->belongsTo(Academicyear::class);
    }

      public function students ()
    {
        return $this->hasMany(Student::class);
    }


      public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function calendars()
    {
        return $this->hasMany(Calendar::class);    
    }

          public function questions()
    {
        return $this->hasMany(Question::class);
        
    }

}
