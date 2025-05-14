<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CompanyResetPasswordNotification;
//use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

	use Notifiable;

  //  protected $guard = '';

	protected $fillable = ['name','email'];

	protected $hidden = ['password', 'remember_token'];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }

 public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }



    public function messages() {
  
  	return $this->hasMany(Message::class);
}

}
