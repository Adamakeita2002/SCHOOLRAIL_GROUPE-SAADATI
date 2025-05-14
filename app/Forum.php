<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    protected $fillable = [
        'title','description','state','student_id','ftheme_id','academicyear_id',
    ];


      public function student()
    {
        return $this->belongsTo(Student::class);
        
    }


      public function commentfrms()
    {
        return $this->hasMany(Commentfrm::class);
    }

      public function ftheme()
    {
        return $this->belongsTo(Ftheme::class);
        
    }

      public function academicyear()
    {
        return $this->belongsTo(Academicyear::class);
        
    }

}
