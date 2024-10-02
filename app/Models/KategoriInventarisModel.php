<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriInventarisModel extends Model
{
    use HasFactory;
    protected $table = 'kategori_inventaris';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'nama_kategori',
    ];
}