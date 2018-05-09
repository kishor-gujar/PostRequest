<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $fillable = ['name', 'email', 'contact_number', 'operation', 'company_id', 'description', 'status'];

    public function rcompany(){
        return $this->belongsTo(ReceiverCompany::class,'company_id');
    }
}
