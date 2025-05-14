<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\TeacherResetPasswordNotification;

class Teacher extends Authenticatable
{

	use Notifiable; 

   protected $guard = 'teacher';

       protected $fillable = [
        'name','surname','fullname','email','tel','password','image','dateofbirth','nationality','address','speciality','gender'
    ];

        protected $hidden = [
        'password', 'remember_token'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPasswordNotification($token));
    }

     public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

      
     public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

     public function absences()
    {
        return $this->hasMany(Absence::class);
    }


     public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

     public function tests()
    {
        return $this->hasMany(Test::class);
    }
 
     public function qcomments()
    {
        return $this->hasMany(Qcomment::class);
    }


      public function ressources ()
    {
        return $this->hasMany(Ressource::class);
    }

      public function calendars ()
    {
        return $this->hasMany(Calendar::class);
    }

      public function cahiers ()
    {
        return $this->hasMany(Cahier::class);
    }

    public function tltns()

    {
        return $this->hasMany(Tltn::class);
    }

    public function tmsgs()
    {
        return $this->belongsToMany(Tmsg::class);
    }
    
}
