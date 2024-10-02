<?php

namespace App\Http\Controllers;

use App\Models\InventarisModel;
use App\Models\KategoriInventarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    public function GetAll()
    {
        $title  = 'barang';
        $data_kategori = KategoriInventarisModel::all();
        $data = InventarisModel::with('JoinToKategori')->get();
        return view('admin.barang', compact('title', 'data', 'data_kategori'));
    }
    public function AddBarang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/barang', ['errors' => 'Validasi gagal: ' . $validator->errors()->first()]);
        }
        try {
            $data = new InventarisModel([
                'id_kategori' => $request->id_kategori,
                'nama_barang' => $request->nama_barang,
                'penerbit' => $request->penerbit,
                'tahun_pelajaran' => $request->tahun_pelajaran,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'tanggal' => $request->tanggal,
                'kondisi' => $request->kondisi,
                'keterangan' => $request->keterangan
            ]);
            // dd($data);
            $data->save();
            return redirect('/barang')->with('message', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect('/barang')->with('errors', 'data gagal disimpan' . $th);
        }
    }

    public function UpdateBarang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/barang', ['errors' => 'Validasi gagal: ' . $validator->errors()->first()]);
        }
        try {
            $data = array(
                'id_kategori' => $request->id_kategori,
                'nama_barang' => $request->nama_barang,
                'penerbit' => $request->penerbit,
                'tahun_pelajaran' => $request->tahun_pelajaran,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'tanggal' => $request->tanggal,
                'kondisi' => $request->kondisi,
                'keterangan' => $request->keterangan
            );
            InventarisModel::where('id_barang', $request->id_barang)->update($data);
            return redirect('/barang')->with('message', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/barang')->with('errors', 'data gagal diedit' . $th);
        }
    }

    public function DeleteBarang($id_barang)
    {
        try {
            InventarisModel::where('id_barang', $id_barang)->delete();
            return redirect('/barang')->with('message', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/barang')->with('errors', 'data gagal di hapus' . $th);
        }
    }
}
