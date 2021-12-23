<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = ['name', 'age', 'photo'];
}
