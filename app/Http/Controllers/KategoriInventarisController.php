<?php

namespace App\Http\Controllers;

use App\Models\InventarisModel;
use App\Models\KategoriInventarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriInventarisController extends Controller
{
    public function GetAll()
    {
        $title  = 'kategori barang';
        $data = KategoriInventarisModel::all();
        return view('admin.kategori', compact('title', 'data'));
    }
    public function AddData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:50|min:2'
        ]);
        if ($validator->fails()) {
            return redirect('/kategori', ['message' => 'Validasi gagal: ' . $validator->errors()->first()]);
        }
        try {
            $data = new KategoriInventarisModel([
                'nama_kategori' => $request->nama_kategori,
            ]);
            $data->save();
            return redirect('/kategori')->with('message', 'data berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect('/kategori')->with('errors', 'data gagal disimpan' . $th);
        }
    }
    public function UpdateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:50|min:2'
        ]);
        if ($validator->fails()) {
            return redirect('/kategori', ['errors' => 'Validasi gagal: ' . $validator->errors()->first()]);
        }
        try {
            $data = array(
                'nama_kategori' => $request->nama_kategori,
            );
            KategoriInventarisModel::where('id_kategori', $request->id_kategori)->update($data);
            return redirect('/kategori')->with('message', 'data berhasil di edit');
        } catch (\Throwable $th) {
            return redirect('/kategori')->with('errors', 'data gagal di edit' . $th);
        }
    }

    public function DeleteData($id_kategori)
    {
        try {
            KategoriInventarisModel::where('id_kategori', $id_kategori)->delete();
            return redirect('/kategori')->with('message', 'data berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect('/kategori')->with('errors', 'data gagal di hapus' . $th);
        }
    }
}
