<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = [
        'breed_name'
    ];
}
