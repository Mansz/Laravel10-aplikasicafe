<?php

namespace App\Http\Controllers;

use App\Exports\LaporanDrinkExport;
use App\Models\Produk;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class LaporanDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::where('kategori', 'drink')->orderBy('tanggal_datang')->get();
        $detailPenjualan = DetailPenjualan::whereHas('produk', function ($query) {
            $query->where('kategori', 'drink');
        })->get();

        return view('admin.laporan-drink.index', compact('produks', 'detailPenjualan'));
    }


    public function exportExcel()
    {
        return Excel::download(new LaporanDrinkExport, 'laporan_drink.xlsx');
    }

    public function exportExcelById($id)
    {
        return Excel::download(new LaporanDrinkExport($id), 'laporan_drink_' . $id . '.xlsx');
    }

    public function exportPDF()
    {
        $produks = Produk::where('kategori', 'drink')->orderBy('tanggal_datang')->get();
        $detailPenjualan = DetailPenjualan::whereHas('produk', function ($query) {
            $query->where('kategori', 'drink');
        })->get();

        $pdf = PDF::loadView('admin.laporan-drink.pdf', compact('produks', 'detailPenjualan'));
        return $pdf->download('laporan_drink.pdf');
    }

    public function exportPDFById($id)
    {
        $produks = Produk::where('kategori', 'drink')->where('id', $id)->orderBy('tanggal_datang')->get();
        $detailPenjualan = DetailPenjualan::whereHas('produk', function ($query) use ($id) {
            $query->where('kategori', 'drink')->where('id', $id);
        })->get();

        $pdf = PDF::loadView('admin.laporan-drink.pdf', compact('produks', 'detailPenjualan'));
        return $pdf->download('laporan_drink_' . $id . '.pdf');
    }

    public function printAll()
    {
        $produks = Produk::where('kategori', 'drink')->orderBy('tanggal_datang')->get();
        $detailPenjualans = DetailPenjualan::whereHas('produk', function ($query) {
            $query->where('kategori', 'drink');
        })->get();

        return view('admin.laporan-drink.print', compact('produks', 'detailPenjualans'));
    }
    public function printById($id)
    {
        $produks = Produk::where('kategori', 'drink')->where('id', $id)->orderBy('tanggal_datang')->get();
        $detailPenjualans = DetailPenjualan::whereHas('produk', function ($query) use ($id) {
            $query->where('kategori', 'drink')->where('id', $id);
        })->get();

        return view('admin.laporan-drink.print', compact('produks', 'detailPenjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
