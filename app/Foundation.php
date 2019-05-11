<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foundation extends Model
{
     protected $fillable=['name','address','rep_id','coming_app','leaving_app'];
     protected $table="foundation";
     protected $primaryKey='foundation_id';
     public $timestamps=false;
    public function person()
    {
    	return $this->hasMany('App\Person','foundation_id');
    }

public function path()
    {
    	return $this->belongsTo('App\Path');
    }
    public function rep()
    {
    	return $this->belongsTo('App\Rep','rep_id');
    }
}
