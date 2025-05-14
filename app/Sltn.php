<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sltn extends Model
{
   
       protected $fillable = [
        'label','type','student_id','reference','state'
    ];

      public function student ()
    {
        return $this->belongsTo(Student::class);
        
    }

}
