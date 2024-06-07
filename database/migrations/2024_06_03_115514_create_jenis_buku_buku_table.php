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
        Schema::create('jenis_buku_buku', function (Blueprint $table) {
            $table->foreignId('id_jenis_buku')->constrained('jenis_buku');
            $table->foreignId('id_buku')->constrained('buku');
            $table->primary(['id_jenis_buku', 'id_buku']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_buku_bukus');
    }
};
