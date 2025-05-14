<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    protected $fillable = [
        'title','description','upload','extension','academicyear_id'
    ];

      public function admin ()
    {
        return $this->belongsTo(Admin::class);
    }

      public function manager ()
    {
        return $this->belongsTo(Manager::class);
    }

          public function commentactus ()
    {
        return $this->hasMany(Commentactu::class);
    }

/*
      public function bdemanager ()
    {
        return $this->belongsTo(bdemanager::class);
    }
*/

}
