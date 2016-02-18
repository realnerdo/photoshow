<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['name', 'directory'];

    /**
     * Get the images for the gallery
     */
    public function images()
    {
        return $this->hasMany('App\File');
    }
}
