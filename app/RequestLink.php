<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLink extends Model
{
    protected $fillable = [
        'receiver_id',
        'receiver_sub_type_id',
        'request_line_id',
        'number',
        'email',
        'preferred_notification',
        'status',
        'ref',
        'state_id',
        'towns',
        'priority_id',
        'duration',
        'total_amount',
        'receiver_type_id'
    ];

    public function receiver(){
        return $this->belongsTo(Receiver::class);
    }
    public function priority(){
        return $this->belongsTo(Priority::class);
    }

    public function receiverSubType() {
        return $this->belongsTo(ReceiverSubType::class);
    }
    public function requestLine(){
        return $this->belongsTo(RequestLine::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }

    public function towns(){
        return $this->hasMany(Town::class);
    }
}
