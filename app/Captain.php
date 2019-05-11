<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table='captain';
    protected $primaryKey = 'cap_id';
     protected $fillable=['cap_id','name','phone','hw_id'];
    public function bus()
    {
    	return $this->hasMany('App\Bus','cap_id');
    }
}
