<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    protected $fillable = ['name', 'number', 'contact_person', 'email', 'address', 'status'];
}
