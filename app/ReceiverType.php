<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiverType extends Model
{
    protected $fillable = ['type', 'code', 'description', 'status'];

    public function  receiverSubType() {
        return $this->hasOne(ReceiverSubType::class, 'receiver_type_id');
    }
}
