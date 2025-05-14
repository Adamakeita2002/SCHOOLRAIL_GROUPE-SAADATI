<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{

    protected $fillable = [
        'epreuve_id','date','time','timing','subject_id','teacher_id','classroom_id','semester_id'
    ];

      public function teacher ()
    {
        return $this->belongsTo(Teacher::class);
    }

      public function subject ()
    {
        return $this->belongsTo(Subject::class);
    }

      public function classroom ()
    {
        return $this->belongsTo(Classroom::class);
    }

      public function epreuve ()
    {
        return $this->belongsTo(Epreuve::class);
    }

}
