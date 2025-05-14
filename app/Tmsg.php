<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmsg extends Model
{
	protected $fillable = [
        'title','description','manager_id','admin_id',
    ];


      public function manager()
    {
        return $this->belongsTo(Manager::class);
        
    }

          public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }


}
