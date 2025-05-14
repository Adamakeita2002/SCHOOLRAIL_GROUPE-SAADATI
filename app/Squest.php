<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Squest extends Model
{
	protected $fillable = [
        'student_id','quest_id','state'
    ];

      public function student ()
    {
        return $this->belongsTo(Student::class);
        
    }


}
