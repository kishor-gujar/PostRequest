<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiverCompany extends Model
{
    protected $fillable = ['name', 'ref', 'status'];
}
