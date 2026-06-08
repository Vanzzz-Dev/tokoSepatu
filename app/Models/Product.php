<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'img',
        'name',
        'stock',
        'harga',
    ];

    // UBAH DARI products() MENJADI category()
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Sedikit koreksi typo nama relasi transaksi jika diperlukan di masa depan
    public function transactionDetail()
    {
        return $this->hasMany(TranstionDetail::class);
    }
}
