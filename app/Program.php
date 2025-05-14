<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	 protected $fillable = [
        'name','fullname','levelInt','levelVar',
    ];
      public function classrooms ()
    {
        return $this->hasMany(Classroom::class);
    }

          public function subjects()
    {
        return $this->hasMany(Subject::class);
        
    }
}
