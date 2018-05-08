<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitedRequest extends Model
{
    protected $fillable = ['sub_type', 'line', 'requester_id', 'state', 'town' , 'status'];

    public function requester(){
        return $this->belongsTo(Requester::class);
    }
}
