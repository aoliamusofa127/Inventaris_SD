<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id('id_barang');
            $table->foreignId('id_kategori');
            $table->string('nama_barang', 150);
            $table->string('penerbit', 100)->nullable();
            $table->char('tahun_pelajaran', 15)->nullable();
            $table->double('jumlah');
            $table->double('harga');
            $table->date('tanggal');
            $table->enum('kondisi', ['rusak berat', 'rusak sedang', 'bagus']);
            $table->text('keterangan');
            $table->timestamps();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori_inventaris')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
