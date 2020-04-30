<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
     protected $fillable = [
        'album_id', 'image_title', 'image_name',
    ];

     public function image()
    {
    	return $this->belongsTo('App\gallery');
    }
}
