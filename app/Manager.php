<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ManagerResetPasswordNotification;

class Manager extends Authenticatable
{

    use Notifiable;

    protected $guard = 'manager';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'tel',
        'password',
        'image'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ManagerResetPasswordNotification($token));
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }



    public function actualities()
    {
        return $this->hasMany(Actuality::class);
    }

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
}
