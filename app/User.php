<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
      return $this->belongsToMany('App\Role','role_users');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasAccess(array $permissions)
    {
      foreach($this->roles as $role){
        if($role->hasAccess($permissions)){
          return true;
        }
      }
      return false;
    }
}
