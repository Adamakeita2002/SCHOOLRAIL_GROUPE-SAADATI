<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\TutorResetPasswordNotification;

class Tutor extends Authenticatable
{


	use Notifiable; 

   protected $guard = 'tutor';

       protected $fillable = [
        'name','surname','email','image','gender','tel','password'
    ];

        protected $hidden = [
        'password', 'remember_token'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TutorResetPasswordNotification($token));
    }

     public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    

      public function students()
    {
        return $this->hasMany(Student::class);
    }

      public function tmsgs()
    {
        return $this->belongsToMany(Tmsg::class);
    }
    
}
