<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bde extends Model
{
    protected $fillable = [
        'title','description','upload','extension'
    ];


/*
      public function bdemanager ()
    {
        return $this->belongsTo(bdemanager::class);
    }
*/

}
