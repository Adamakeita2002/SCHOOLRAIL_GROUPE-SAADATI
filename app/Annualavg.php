<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annualavg extends Model
{

	    protected $fillable = [
        'label','value','rank','state'
        'student_id',
        'classroom_id',
        'academicyear_id',

    ];
	
      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

      public function classroom()
    {
        return $this->belongsTo(Classroom::class);
        
    }

      public function academicyear()
    {
        return $this->belongsTo(Academicyear::class);
        
    }

}
