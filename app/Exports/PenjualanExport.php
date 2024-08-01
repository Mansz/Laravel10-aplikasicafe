<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection, WithHeadings
{
    protected $penjualans;

    public function __construct($penjualans = null)
    {
        $this->penjualans = $penjualans ?: Penjualan::with('detailPenjualans.produk')->get();
    }

    public function collection()
    {
        $exportData = collect();

        foreach ($this->penjualans as $penjualan) {
            foreach ($penjualan->detailPenjualans as $detail) {
                $exportData->push([
                    'Kode Invoice' => $penjualan->kode_invoice,
                    'Tanggal' => $penjualan->tgl,
                    'Produk' => $detail->produk->nama,
                    'Kategori' => $detail->produk->kategori,
                    'Tanggal Datang' => $detail->produk->tanggal_datang,
                    'Exp' => $detail->produk->exp,
                    'Qty' => $detail->qty_keluar,
                ]);
            }
        }

        return $exportData;
    }

    public function headings(): array
    {
        return [
            'Kode Invoice',
            'Tanggal',
            'Produk',
            'Kategori',
            'Tanggal Datang',
            'Exp',
            'Qty',
        ];
    }
}
