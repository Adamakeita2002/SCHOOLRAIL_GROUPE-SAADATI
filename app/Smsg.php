<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smsg extends Model
{
	protected $fillable = [
        'title','description','manager_id','admin_id',
    ];


      public function manager()
    {
        return $this->belongsTo(Manager::class);
        
    }

          public function students()
    {
        return $this->belongsToMany(Student::class);
    }


}
