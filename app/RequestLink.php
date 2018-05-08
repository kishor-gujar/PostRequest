<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestLink extends Model
{
    protected $fillable = ['name', 'type', 'sub_type', 'request_line', 'link_number', 'link_email', 'preferred_notification', 'status', 'link_ref', 'link_state', 'link_town', 'priority', 'link_duration', 'total_amount'];
}
