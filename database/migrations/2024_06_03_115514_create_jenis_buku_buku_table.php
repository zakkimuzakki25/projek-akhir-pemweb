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
        Schema::create('jenis_buku_bukus', function (Blueprint $table) {
            $table->unsignedInteger('id_jenis_buku');
            $table->unsignedInteger('id_buku');
            $table->primary(['id_jenis_buku', 'id_buku']);

            $table->foreign('id_jenis_buku')->references('id')->on('jenis_bukus')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('bukus')->onDelete('cascade');

            $table->timestamps();
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
