<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
	protected $fillable = [
        'dateLimite','classroomName','upload','subject_id','label','teacher_id','testNum','academicyear_id',
    ];

      public function teacher()
    {
        return $this->belongsTo(Teacher::class);
        
    }

      public function subject()
    {
        return $this->belongsTo(Subject::class);
        
    }

      public function ahomeworks()
    {
        return $this->hasMany(Ahomework::class);
        
    }


}
