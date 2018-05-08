<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    protected $fillable = ['name', 'contact_person_name', 'status'];
}
