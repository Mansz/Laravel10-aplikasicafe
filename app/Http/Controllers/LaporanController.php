<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Produk;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenjualanExport;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans = Penjualan::with('detailPenjualans.produk')->distinct('id_penjualan')->get();
        $detailPenjualans = DetailPenjualan::with('produk')->get()->groupBy('id_penjualan');

        return view('admin.laporan.index', compact('penjualans', 'detailPenjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function exportExcel()
    {
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }

    public function exportPDF()
    {
        $penjualans = Penjualan::with('detailPenjualans.produk')->get();
        $pdf = PDF::loadView('admin.laporan.pdf', compact('penjualans'));
        return $pdf->download('penjualan.pdf');
    }
    public function exportExcelById($id)
    {
        $penjualan = Penjualan::with('detailPenjualans.produk')->findOrFail($id);
        return Excel::download(new PenjualanExport([$penjualan]), 'penjualan-' . $penjualan->kode_invoice . '.xlsx');
    }

    public function exportPDFById($id)
    {
        $penjualan = Penjualan::with('detailPenjualans.produk')->findOrFail($id);
        $pdf = PDF::loadView('admin.laporan.pdf', ['penjualans' => [$penjualan]])->setPaper('a4', 'landscape');
        return $pdf->download('penjualan-' . $penjualan->kode_invoice . '.pdf');
    }
    public function printById($id)
    {
        $penjualan = Penjualan::with('detailPenjualans.produk')->findOrFail($id);
        return view('admin.laporan.print', compact('penjualan'));
    }
    public function printAll()
    {
        $penjualans = Penjualan::with('detailPenjualans.produk')->get();
        return view('admin.laporan.print-all', compact('penjualans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
