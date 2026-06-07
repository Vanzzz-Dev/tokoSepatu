<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  public function transction(){
    return $this->hasMany(Transtion::class);
  }
}
