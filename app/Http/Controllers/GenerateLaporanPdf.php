<?php

namespace App\Http\Controllers;

use App\Models\InventarisModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GenerateLaporanPdf extends Controller
{
    public function ShowPdf()
    {
        $data = InventarisModel::with('joinToKategori')->get();
        $title  = "laporan inventaris";
        $rb = InventarisModel::where('kondisi', 'rusak berat')->get()->count();
        $rs = InventarisModel::where('kondisi', 'rusak sedang')->get()->count();
        $b = InventarisModel::where('kondisi', 'bagus')->get()->count();

        return view('admin.preview_laporan', compact('title', 'data', 'rb', 'rs', 'b'));
    }

    public function Index()
    {
        $data = InventarisModel::with('joinToKategori')->get();
        $title  = "laporan inventaris";
        $rb = InventarisModel::where('kondisi', 'rusak berat')->get()->count();
        $rs = InventarisModel::where('kondisi', 'rusak sedang')->get()->count();
        $b = InventarisModel::where('kondisi', 'bagus')->get()->count();

        $pdf = Pdf::loadView('admin.generate_pdf', compact('title', 'data', 'rb', 'rs', 'b'));
        $date = date('d/m/y');
        return $pdf->download('lapaoran_inventaris.pdf');
    }
}
