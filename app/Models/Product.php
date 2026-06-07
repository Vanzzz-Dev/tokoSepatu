<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function products()
    {
        return $this->belongsTo(Category::class);
    }

    public function trasctionDetail()
    {
        return $this->hasMany(TranstionDetail::class);
    }
}
