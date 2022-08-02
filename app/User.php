<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
   use Notifiable, HasRoles, Billable;

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
     'name', 'email', 'password','image', 'username'
   ];

   /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
   protected $hidden = [
     'password', 'remember_token',
   ];

   public function files(){
      return $this->hasMany(File::class);
   }

   // public function setPasswordAttribute($password)
   // {
   //    $this->attributes['password'] = bcrypt($password);
   // }

}
