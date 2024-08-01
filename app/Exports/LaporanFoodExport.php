<?php

namespace App\Exports;

use App\Models\Produk;
use App\Models\DetailPenjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanFoodExport implements FromCollection, WithHeadings, WithMapping
{
    protected $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function collection()
    {
        if ($this->id) {
            return Produk::where('kategori', 'food')->where('id', $this->id)->with('detailPenjualans')->get();
        }
        return Produk::where('kategori', 'food')->with('detailPenjualans')->get();
    }

    public function headings(): array
    {
        return [
            'PLU',
            'Nama',
            'Exp',
            'Tanggal Datang',
            'Stock',
            'Kategori',
            'Barang Keluar',
        ];
    }

    public function map($produk): array
    {
        $barangKeluar = $produk->detailPenjualans ? $produk->detailPenjualans->sum('qty_keluar') : 0;

        return [
            $produk->plu,
            $produk->nama,
            $produk->exp,
            $produk->tanggal_datang,
            $produk->qty,
            $produk->kategori,
            $barangKeluar,
        ];
    }
}
