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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('id_member');
            $table->string('id_product');
            $table->string('allprice');//harga semua jumlah barang
            $table->string('shippingcost');//harga pengiriman
            $table->string('totalcost');//penjumlahan allprice+shippingcost
            $table->string('transactionmonth');//bulan transaksi
            $table->string('status');//status transaksi

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
