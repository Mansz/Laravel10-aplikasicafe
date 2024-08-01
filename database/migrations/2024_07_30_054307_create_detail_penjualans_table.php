<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_invoice');
            $table->foreignId('id_penjualan')->constrained('penjualan')->onDelete('cascade')->onUpdate('cascade')->default(null);
            $table->foreignId('id_produk')->constrained('produk')->onDelete('cascade')->onUpdate('cascade')->default(null);
            // $table->string('harga_barang');
            $table->string('stock');
            $table->string('plu');
            $table->string('qty_keluar');
            $table->string('exp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
