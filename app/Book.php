<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   protected $table='book';
   public $timestamps = false;
   protected $fillable=['name','prof_id'];
   public function prof()
   {
       return $this->belongsTo('App\Prof');
   }
}
