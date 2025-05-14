<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{

       protected $fillable = [
        'type','amount', 'student_id','created_at'
    ];

      public function student ()
    {
        return $this->belongsTo(Student::class);
    }

}
