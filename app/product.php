<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	 protected $fillable = ['category','name_ar','name_en','description_ar','description_en','purchase','sale','stock'];
    public function category(){
    	return $this->belongsTo(category::class);
    }
}
