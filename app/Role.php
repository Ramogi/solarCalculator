<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','slug','permissions'];

    public function users()
    {
      return $this->belongsToMany('App\User','role_users');
    }

    public function hasAccess(array $permissions)
    {
      foreach($permissions as $permission){
        if($this->hasPermission($permissions)){
          return true;
        }
      }
      return false;
    }

    protected function hasPermission(string $permission)
    {
        $permissions = json_encode($this->permissions, true);
        return $permissions[$permission]??false;

    }

}
