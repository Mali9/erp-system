<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
         protected $fillable=['bus_id','path_num','path_arr','foundation_id'];
         public function bus()
    {
    	return $this->hasMany('App\Bus');
    }

 public function col_point()
    {
    	return $this->hasMany('App\Col_point');
    }
    public function foundation()
    {
    	return $this->hasMany('App\Foundation');
    }
}
