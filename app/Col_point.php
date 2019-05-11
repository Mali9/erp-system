<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Col_point extends Model
{
     protected $fillable=['name','time','lang','lat','address'];
     protected $primaryKey='id';
     protected $table='col_point';
     public $timestamps=false;
    public function person()
    {
    	return $this->hasMany('App\Person','point_id');
    }

    public function path()
    {
    	return $this->belongsTo('App\Path');
    }
}
