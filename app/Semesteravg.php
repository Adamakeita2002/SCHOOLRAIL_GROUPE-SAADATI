<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semesteravg extends Model
{

	    protected $fillable = [
        'label','value','rank','state',
        'student_id',
        'classroom_id',
        'semester_id'

    ];
	
      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

      public function classroom()
    {
        return $this->belongsTo(Classroom::class);
        
    }


      public function semester()
    {
        return $this->belongsTo(Semester::class);
        
    }

}
