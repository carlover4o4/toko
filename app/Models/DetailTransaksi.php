<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori_id',
        'produk_id',
        'transaksi_id',
        'qty',
        'status',
        'totalprice',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
