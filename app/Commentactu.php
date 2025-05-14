<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentactu extends Model
{
      public function student ()
    {
        return $this->belongsTo(Student::class);
    }

      public function actuality ()
    {
        return $this->belongsTo(Actuality::class);
    }

}
