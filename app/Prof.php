<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    protected $table='prof';
    public $timestamps = false;

    protected $fillable=['name'];
    public function book()
    {
        return $this->hasMany('App\Book');
    }
}
