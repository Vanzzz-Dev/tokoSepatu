<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'total_tagihan',
        'jumlah_diterima',
        'kembalian',
        'metode_pembayaran',
    ];

    public function detials(){
        return $this->hasMany(TransactionDetail::class);
    }
}
