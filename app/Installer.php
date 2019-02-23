<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Installer extends Model
{
    protected $fillable = [
    'name',
    'email',
    'location'
  ];
  protected $primaryKey = 'id';

  public function services()
{
    return $this->belongsToMany('App\Service')
      ->withTimestamps();
}
}


