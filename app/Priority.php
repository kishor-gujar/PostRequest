<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    protected $fillable = ['name', 'amount', 'status'];
}
