<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Auth;

class SettingController extends Controller
{
    public function index()
    {
    	return view('admin.setting');
    }

    public function update(Request $request)
    {
    	$id = Auth::user()->id;
    	$data = $request->all();
        $user = User::findOrFail($id);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->file) {

            // Delete file lama
            File::delete('img/nasabah/'. $user->gambar);

            // Upload file baru
            $file = $request->file('file');
            $namafile = uniqid().'.'.$file->extension();
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
