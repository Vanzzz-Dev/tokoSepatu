<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranstionDetail extends Model
{
    public function transction(){
        return $this->belongsTo(Transtion::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
