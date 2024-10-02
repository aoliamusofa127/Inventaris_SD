<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function GetAll()
    {
        $title  = 'akun';
        $data = User::all();
        return view('admin.users', compact('title', 'data'));
    }
    public function AddUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        try {
            $data = new User([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            $data->save();
            return redirect('/users')->with('message', 'data berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect('/users')->with('errors', 'data gagal disimpan' . $th);
        }
    }
    public function UpdateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        try {
            $data = array(
                'username' => $request->username,
                'password' => Hash::make($request->password),
            );
            User::where('id_user', $request->id_user)->update($data);
            return redirect('/users')->with('message', 'data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect('/users')->with('errors', 'data gagal diedit' . $th);
        }
    }
    public function DeleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect('/users')->with('message', 'data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect('/users')->with('errors', 'data gagal dihapus' . $th);
        }
    }
}
