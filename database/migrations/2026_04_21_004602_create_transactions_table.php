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
        $table->id(); // [cite: 117]
        
        // Relasi ke tabel events, jika event dihapus maka transaksi ikut terhapus
        $table->foreignId('event_id')->constrained()->cascadeOnDelete(); // 
        
        $table->string('order_id')->unique(); // ID Pesanan unik untuk sistem [cite: 120]
        $table->string('customer_name'); // [cite: 127]
        $table->string('customer_email'); // [cite: 128]
        $table->string('customer_phone'); // [cite: 129]
        $table->integer('total_price'); // [cite: 130]
        
        // Status awal otomatis 'Pending'
        $table->string('status')->default('Pending'); // [cite: 131]
        
        // Token untuk integrasi pembayaran (seperti Midtrans)
        $table->string('snap_token')->nullable(); // [cite: 132]
        
        $table->timestamps(); // [cite: 133]
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
