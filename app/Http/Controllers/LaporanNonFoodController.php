<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use App\Exports\LaporanFoodExport;
use App\Exports\LaporanNonFoodExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanNonFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::where('kategori', 'non food')->orderBy('tanggal_datang')->get();
        $detailPenjualan = DetailPenjualan::whereHas('produk', function ($query) {
            $query->where('kategori', 'non food');
        })->get();

        return view('admin.laporan-non-food.index', compact('produks', 'detailPenjualan'));
    }


    public function exportExcel()
    {
        return Excel::download(new LaporanNonFoodExport, 'laporan_non-food.xlsx');
    }

    public function exportExcelById($id)
    {
        return Excel::download(new LaporanNonFoodExport($id), 'laporan_non-food_' . $id . '.xlsx');
    }

    public function exportPDF()
    {
        $produks = Produk::where('kategori', 'non food')->orderBy('tanggal_datang')->get();
        $detailPenjualan = DetailPenjualan::whereHas('produk', function ($query) {
            $query->where('kategori', 'non food');
        })->get();

        $pdf = PDF::loadView('admin.laporan-non-food.pdf', compact('produks', 'detailPenjualan'));
        return $pdf->download('laporan_non-food.pdf');
    }

    public function exportPDFById($id)
    {
        $produks = Produk::where('kategori', 'non food')->where('id', $id)->orderBy('tanggal_datang')->get();
        $detailPenjualan = DetailPenjualan::whereHas('produk', function ($query) use ($id) {
            $query->where('kategori', 'non food')->where('id', $id);
        })->get();

        $pdf = PDF::loadView('admin.laporan-non-food.pdf', compact('produks', 'detailPenjualan'));
        return $pdf->download('laporan_non-food_' . $id . '.pdf');
    }

    public function printAll()
    {
        $produks = Produk::where('kategori', 'non food')->orderBy('tanggal_datang')->get();
        $detailPenjualans = DetailPenjualan::whereHas('produk', function ($query) {
            $query->where('kategori', 'non food');
        })->get();

        return view('admin.laporan-non-food.print', compact('produks', 'detailPenjualans'));
    }
    public function printById($id)
    {
        $produks = Produk::where('kategori', 'non food')->where('id', $id)->orderBy('tanggal_datang')->get();
        $detailPenjualans = DetailPenjualan::whereHas('produk', function ($query) use ($id) {
            $query->where('kategori', 'non food')->where('id', $id);
        })->get();

        return view('admin.laporan-non-food.print', compact('produks', 'detailPenjualans'));
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
