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

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans = Penjualan::all();
        $title = 'Delete Penjualan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.penjualan.index', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::orderBy('tanggal_datang')->get();
        return view('admin.penjualan.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $request->validate([
                'tgl' => 'required|date',
                'kode_invoice' => 'required|string|max:255',
                'plu' => 'required|array',
                'qty_keluar' => 'required|array'
            ]);

            $penjualan = Penjualan::create([
                'kode_invoice' => $request->kode_invoice,
                'tgl' => $request->tgl,
            ]);

            foreach ($request->plu as $key => $plu) {
                $qty_keluar = (int)$request->qty_keluar[$key];
                $produk = Produk::where('plu', $plu)->first();

                if ($produk) {
                    if ($qty_keluar > $produk->qty) {
                        // If stock is not enough, return an error response
                        return response()->json(['error' => 'Stock tidak cukup untuk produk ' . $produk->nama], 400);
                    }

                    DetailPenjualan::create([
                        'id_penjualan' => $penjualan->id,
                        'kode_invoice' => $request->kode_invoice,
                        'id_produk' => $produk->id,
                        'harga_barang' => $produk->harga,
                        'stock' => $produk->qty,
                        'plu' => $produk->plu,
                        'qty_keluar' => $qty_keluar,
                        'exp' => $produk->exp
                    ]);

                    $produk->qty -= $qty_keluar;
                    $produk->save();
                }
            }

            return response()->json(['success' => 'Penjualan berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        // Decrypt the ID if encrypted
        $id = Crypt::decrypt($id);

        // Retrieve the penjualan and its details
        $penjualan = Penjualan::findOrFail($id);
        $detailPenjualan = DetailPenjualan::where('id_penjualan', $id)->get();
        $produks = Produk::all();

        return view('admin.penjualan.update', compact('penjualan', 'detailPenjualan', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'tgl' => 'required|date',
                'kode_invoice' => 'required|string|max:255',
                'plu' => 'required|array',
                'qty_keluar' => 'required|array'
            ]);

            $penjualan = Penjualan::findOrFail($id);
            $penjualan->update([
                'kode_invoice' => $request->kode_invoice,
                'tgl' => $request->tgl,
            ]);

            // Hapus detail penjualan lama
            DetailPenjualan::where('id_penjualan', $id)->delete();

            foreach ($request->plu as $key => $plu) {
                $qty_keluar = (int)$request->qty_keluar[$key];
                $produk = Produk::where('plu', $plu)->first();

                if ($produk) {
                    if ($qty_keluar > $produk->qty) {
                        return response()->json(['error' => 'Stok tidak cukup untuk produk dengan PLU ' . $plu], 400);
                    }

                    DetailPenjualan::create([
                        'id_penjualan' => $penjualan->id,
                        'kode_invoice' => $request->kode_invoice,
                        'id_produk' => $produk->id,
                        'harga_barang' => $produk->harga,
                        'stock' => $produk->qty,
                        'plu' => $produk->plu,
                        'qty_keluar' => $qty_keluar,
                        'exp' => $produk->exp
                    ]);

                    $produk->qty -= $qty_keluar;
                    $produk->save();
                } else {
                    return response()->json(['error' => 'Produk dengan PLU ' . $plu . ' tidak ditemukan.'], 404);
                }
            }

            return response()->json(['success' => 'Penjualan berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        DetailPenjualan::where('id_penjualan', $id)->delete();
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus');
    }
}
