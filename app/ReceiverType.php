<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiverType extends Model
{
    protected $fillable = ['type', 'type_code', 'description', 'status'];
}
