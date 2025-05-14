<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjectavg extends Model
{

    protected $fillable = [
        'label','valueClass','valuExam','valueGrle','rank','student_id','subject_id','classroom_id','semester_id',
    ];

      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

      public function subject()
    {
        return $this->belongsTo(Subject::class);
        
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
