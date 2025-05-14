<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ftheme extends Model
{

      public function forums()
    {
        return $this->hasMany(Forum::class);
    }

    public function getRouteKeyName()
    
    {
        return 'label';
    }


}
