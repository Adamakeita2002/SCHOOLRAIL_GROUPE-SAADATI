<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{

    protected $fillable = [
        'absence_date','teacher_id','subject_id',
    ];
  
      public function students()
    {
        return $this->belongsToMany(Student::class);
        
    }

      public function teacher()
    {
        return $this->belongsTo(Teacher::class);
        
    }

      public function subject()
    {
        return $this->belongsTo(Subject::class);
        
    }


}
