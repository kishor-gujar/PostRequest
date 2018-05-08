<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackgroundImage extends Model
{
    protected $fillable = ['name', 'advertiser_id', 'image', 'text', 'external_link', 'start_date', 'end_date'];
}
