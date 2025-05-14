<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Maatwebsite\Excel\Concerns\ToModel;

class Newregstudent extends Authenticatable
{
   use Notifiable; 


       protected $fillable = [
        'name','surname','dateofbirth','president','Pmessage','postbde','matricule','nationality','address', 'gender', 'email',  'tel','image','program_id', 'password','montant'
    ];

        protected $hidden = [
        'password', 'remember_token'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }

     public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    

     public function yearavgs()
    {
        return $this->hasMany(Yearavg::class);
    }

     public function semesteravgs()
    {
        return $this->hasMany(Semesteravg::class);
    }

     public function subjectavgs()
    {
        return $this->hasMany(Subjectavg::class);
    }

     public function forums()
    {
        return $this->hasMany(Forum::class);
    }

     public function qestions()
    {
        return $this->hasMany(Question::class);
    }

     public function qcomments()
    {
        return $this->hasMany(Qcomment::class);
    }

     public function marks()
    {
        return $this->hasMany(Mark::class);
    }

     public function commentfrms()
    {
        return $this->hasMany(Commentfrm::class);
    }

     public function commentactus()
    {
        return $this->hasMany(Commentactu::class);
    }

     public function versements()
    {
        return $this->hasMany(Versement::class);
    }

     public function tests()
    {
        return $this->belongsToMany(Test::class);
        
    }

     public function classroom ()
    {
        return $this->belongsTo(Classroom::class);
    }

     public function tutor ()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function ahomeworks()
    {
        return $this->hasMany(Ahomework::class);
    }


    public function sltns()

    {
        return $this->hasMany(Sltn::class);
    }

    public function academicyears()
    {
        return $this->belongsToMany(Academicyear::class);
    }

    public function smsgs()
    {
        return $this->belongsToMany(Smsg::class);
    }

}
