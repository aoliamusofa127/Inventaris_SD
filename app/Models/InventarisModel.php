<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisModel extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'id_kategori',
        'nama_barang',
        'penerbit',
        'tahun_pelajaran',
        'jumlah',
        'harga',
        'tanggal',
        'kondisi',
        'keterangan',
    ];

    public function  JoinToKategori()
    {
        return $this->hasMany(KategoriInventarisModel::class, 'id_kategori', 'id_kategori');
    }
}
