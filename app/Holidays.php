<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    protected $fillable = ['title', 'description', 'img'];
}
