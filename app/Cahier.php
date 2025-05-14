<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{

	protected $fillable = [
        'content','title','date','teacher_id','subject_id',
    ];


      public function teacher ()
    {
        return $this->belongsTo(Teacher::class);
    }

      public function subject ()
    {
        return $this->belongsTo(Subject::class);
    }


}
