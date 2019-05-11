<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable=['name','phone','address','active','card_id','point_id','foundation_id'];
    protected $table="users";
    protected $primaryKey='person_id';
    public $timestamps=false;
public function col_point()
    {
    	return $this->belongsTo('App\Col_point','point_id');
    }
    public function f()
    {
    	return $this->belongsTo('App\Foundation','foundation_id');
    }
}
