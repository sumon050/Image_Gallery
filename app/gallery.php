<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
   protected $fillable = [
        'album_name', 'album_cover', 'description',
    ];

    public function image()
    {
    	return $this->hasMany('App\image');
    }
}
