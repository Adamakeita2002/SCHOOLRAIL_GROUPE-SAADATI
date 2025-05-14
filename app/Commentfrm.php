<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentfrm extends Model
{

	protected $fillable = [
        'description','state','student_id','forum_id',
    ];

      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }

       public function forum()
    {
        return $this->belongsTo(Forum::class);
        
    }
}
