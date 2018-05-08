<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $fillable = ['name', 'email', 'contact_number', 'operation', 'company', 'description', 'status'];
}
