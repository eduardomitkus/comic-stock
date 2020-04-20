<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [ 'date', 'type', 'createad_by', 'comic_id' ];

}
