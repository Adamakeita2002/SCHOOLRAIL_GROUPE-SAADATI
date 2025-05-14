<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahomework extends Model
{

	protected $fillable = [
        'label','upload','student_id','homework_id','academicyear_id',
    ];


      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }


      public function academicyear()
    {
        return $this->belongsTo(Academicyear::class);
        
    }

      public function homework()
    {
        return $this->belongsTo(Homework::class);
    }


}
