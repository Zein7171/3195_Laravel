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
    Schema::create('events', function (Blueprint $table) {
        $table->id(); // [cite: 99]
        
        // Foreign Key relasi ke tabel categories
        $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // [cite: 101, 102]
        
        $table->string('title'); // [cite: 103]
        $table->text('description')->nullable(); // [cite: 104]
        $table->dateTime('date'); // [cite: 105]
        $table->string('location'); // [cite: 106]
        $table->integer('price'); // [cite: 107]
        $table->integer('stock'); // [cite: 108]
        $table->string('poster_path')->nullable(); // [cite: 109]
        $table->timestamps(); // [cite: 110]
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
