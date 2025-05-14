<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\BdemanagerResetPasswordNotification;

class Bdemanager extends Authenticatable
{

	use Notifiable; 

   protected $guard = 'bdemanager';

       protected $fillable = [
        'name','surname','email','tel','password'
    ];

        protected $hidden = [
        'password', 'remember_token'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new BdemanagerResetPasswordNotification($token));
    }

     public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    

      public function actualities()
    {
        return $this->hasMany(Actuality::class);
    }
    
}
