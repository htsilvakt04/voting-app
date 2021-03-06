<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ["title", "slug", "color"];

   
    public function getTitle()
    {
    	return $this->title;
    }
    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
