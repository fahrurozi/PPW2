<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    
    protected $table = 'galeri';

    public function bukus(){
        return $this->belongsTo('App\Buku', 'id_buku', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
