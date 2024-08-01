<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_produk', 'id');
    }
}
