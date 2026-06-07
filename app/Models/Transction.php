<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transtion extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function detials(){
        return $this->hasMany(TranstionDetail::class);
    }
}
