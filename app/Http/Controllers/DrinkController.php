<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::where('kategori', 'drink')->orderBy('tanggal_datang')->get();
        $title = 'Delete produk!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.drink.index', compact('produks'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'plu' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'exp' => 'required|date',
            'tanggal_datang' => 'required|date',
            'qty' => 'required|string|max:255',
            'loc' => 'required|string|max:255',
        ]);

        try {
            Produk::create([
                'plu' => $request->plu,
                'nama' => $request->nama,
                'exp' => $request->exp,
                'tanggal_datang' => $request->tanggal_datang,
                'qty' => $request->qty,
                'kategori' => 'drink',
                'loc' => $request->loc,
            ]);
            return redirect()->route('drink.index')->with('success', 'Produk created successfully.');
        } catch (\Exception $e) {
            \Log::error('Error creating produk: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create produk. Please try again.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit($id)
    {
        $food = Produk::findOrFail(Crypt::decrypt($id));
        return view('admin.drink.update', compact('food'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'plu' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'exp' => 'required|date',
            'tanggal_datang' => 'required|date',
            'qty' => 'required|string|max:255',
            'loc' => 'required|string|max:255',
        ]);

        try {
            $food = Produk::findOrFail($id);
            $food->update([
                'plu' => $request->plu,
                'nama' => $request->nama,
                'exp' => $request->exp,
                'tanggal_datang' => $request->tanggal_datang,
                'qty' => $request->qty,
                'kategori' => 'drink',
                'loc' => $request->loc,
            ]);
            return redirect()->route('drink.index')->with('success', 'Produk updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Error updating produk: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update produk. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Produk = Produk::findOrFail($id);
        $Produk->delete();
        return redirect()->route('drink.index')->with('success', 'Produk deleted successfully.');
    }
}
