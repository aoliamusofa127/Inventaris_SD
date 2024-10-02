<?php

namespace App\Http\Controllers;

use App\Models\InventarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Index()
    {
        $title = "Dashboard";
        $rb = InventarisModel::where('kondisi', 'rusak berat')->get()->count();
        $rs = InventarisModel::where('kondisi', 'rusak sedang')->get()->count();
        $b = InventarisModel::where('kondisi', 'bagus')->get()->count();
        return view('admin.dashboard', compact('title', 'rb', 'rs', 'b'));
    }
}
