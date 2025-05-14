<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tltn extends Model
{
   
       protected $fillable = [
        'label','type','teacher_id','reference','state'
    ];

      public function teacher ()
    {
        return $this->belongsTo(Teacher::class);
        
    }

}
