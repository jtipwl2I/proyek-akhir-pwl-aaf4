<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class SettingNasabahController extends Controller
{
    public function index(){
        return view ('nasabah.setting');
    }

    public function update(Request $request){
       
        $id = Auth::user()->id;

        $data = $request->except('password_confirmation');
        // dd($data);
        $user = User::findOrFail($id);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->gambar) {

        
            // Upload file baru
            $file = $request->file('gambar');
            $namafile = uniqid() . '.' . $file->extension();
            $file->move('img/nasabah', $namafile);
            $data['gambar'] = $namafile;
        } else {

            unset($data['gambar']);
        }

        $update = $user->update($data);

        if ($update) {
            return redirect()->back()->with(['success' => 'Berhasil mengupdate data']);
        } else {
            return redirect()->back()->with(['failed' => 'Gagal mengupdate data, coba beberapa saat lagi']);
        }
    }
}
