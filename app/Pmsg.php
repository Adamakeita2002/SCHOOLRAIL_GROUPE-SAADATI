<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pmsg extends Model
{
	protected $fillable = [
        'title','description','manager_id','admin_id',
    ];


      public function manager()
    {
        return $this->belongsTo(Manager::class);
        
    }

          public function tutors()
    {
        return $this->belongsToMany(Tutor::class);
    }


}
