<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['url'];

    /**
     * Get the file that owns the gallery.
     */
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }
}
