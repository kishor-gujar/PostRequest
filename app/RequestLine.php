<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLine extends Model
{
    protected $fillable = ['line', 'receiver_type', 'receiver_sub_type', 'request_line_description', 'price_per_month', 'status'];
}
