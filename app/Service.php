<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $fillable = [
    'name',

  ];
  	protected $primaryKey = 'id';
  	public function installers()
{
    return $this->belongsToMany('App\Installer')
      ->withTimestamps();

}
}



