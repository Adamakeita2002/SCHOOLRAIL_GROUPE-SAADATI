<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model

{

       protected $fillable = [
        'value','type','student_id','test_id','semester_id','subject_id'
    ];

      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

      public function semester()
    {
        return $this->belongsTo(Semester::class);
        
    }

      public function subject()
    {
        return $this->belongsTo(Subject::class);
        
    }

      public function test()
    {
        return $this->belongsTo(Test::class);
        
    }

}
