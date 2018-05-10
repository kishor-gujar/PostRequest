<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $fillable = ['name', 'advertiser_id', 'image', 'text', 'external_link', 'start_date', 'end_date', 'status'];

    public function advertiser(){
        return $this->belongsTo(Advertiser::class);
    }
}
