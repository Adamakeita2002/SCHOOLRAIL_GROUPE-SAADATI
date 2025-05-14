<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yearavg extends Model
{

    protected $fillable = [
        'label','value','student_id','academicyear_id','semester_id'
    ];

      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

      public function academicyear()
    {
        return $this->belongsTo(Academicyear::class);
        
    }


}
