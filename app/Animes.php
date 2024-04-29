<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    protected $table = 'anime';

    protected $fillable = [
        'title' ,
        'genre' ,
        'year' ,
        'thumbnail' 
    ];
}
