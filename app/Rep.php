<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\IsFalse;

class Rep extends Model
{
         protected $fillable=['name','phone'];
         protected $table='rep';
         public $primaryKey='rep_id';
         public $timestamps=False;
         public function foundation()
    {
    	return $this->hasMany('App\Foundation','rep_id');
    }

}
