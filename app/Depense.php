<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{

       protected $fillable = [
        'motif','amount', 'receiver', 'source',  'manager_id', 
    ];

      public function manager ()
    {
        return $this->belongsTo(Manager::class);
    }

}
