<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  protected $fillable = ['name_ar','name_en'];

  public function products(){
    return $this->hasMany('App\product');
  }
}
