<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

	protected $fillable = ['firstname','lastname','midname','email','address','password','level'];
 }
