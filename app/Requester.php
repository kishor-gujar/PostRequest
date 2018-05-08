<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Requester extends Model
{
    protected $fillable = ['number', 'email', 'name', 'status'];

    public function  requests() {
        return $this->hasMany(SubmitedRequest::class);
    }
}
