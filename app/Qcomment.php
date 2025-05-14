<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qcomment extends Model
{

	protected $fillable = [
        'description','student_id','question_id','teacher_id'
    ];

      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

      public function teacher()
    {
        return $this->belongsTo(Teacher::class);
        
    }

       public function question()
    {
        return $this->belongsTo(Question::class);
        
    }
}
