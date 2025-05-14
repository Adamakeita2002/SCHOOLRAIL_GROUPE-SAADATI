<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'title','description','subject_id','student_id','classroom_id','academicyear_id'
    ];


      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

      public function subject()
    {
        return $this->belongsTo(Subject::class);
        
    }

          public function academicyear()
    {
        return $this->belongsTo(Academicyear::class);
        
    }

          public function classroom()
    {
        return $this->belongsTo(Classroom::class);
        
    }

      public function qcomments()
    {
        return $this->hasMany(Qcomment::class);
    }


}
