<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLine extends Model
{
    protected $fillable = ['line', 'receiver_type_id', 'receiver_sub_type_id', 'request_line_description', 'price_per_month', 'status'];
}
