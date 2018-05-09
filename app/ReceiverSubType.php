<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiverSubType extends Model
{
    protected $fillable = ['text', 'receiver_type_id', 'description', 'image', 'status'];

    public function receiverType(){
        return $this->belongsTo(ReceiverType::class);
    }
}
