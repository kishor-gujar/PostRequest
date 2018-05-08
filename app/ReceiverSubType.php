<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiverSubType extends Model
{
    protected $fillable = ['text', 'receiver_type', 'description', 'image', 'status'];
}
