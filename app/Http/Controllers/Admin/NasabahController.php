<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;

class NasabahController extends Controller
{
    public function index()
    {
        $users = new User();
        $users = $users->getNasabah();
        return view('admin.admin', compact(['users']));
    }

    public function create()
    {
    	return view('admin.nasabah-tambah');
    }

    public function store(Request $request)
    {
        
    	$request->validate([
    		// 'first_name' => 'required|max:191',
    		// 'last_name' => 'required|max:191',
    		// 'email' => 'email|required|max:191',
    		'password' => 'required|confirmed'
    		// 'country' => 'required|max:191',
    		// 'province' => 'required|max:191',
    		// 'city' => 'required|max:191',
    		// 'postal_code' => 'required'
    	]);

		$file = $request->file('gambar');

		$namafile = uniqid().'.'.$file->extension ();

		$file->move('img/nasabah', $namafile);
		$data = $request->except('password_confirmation');
		$data['gambar'] = $namafile;
    	$data['city'] = $request->city;
    	$data['password'] = bcrypt($request->password);
    	$data['username'] = $request->first_name.' '.$request->last_name;
        $data['no_rek'] = random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9);
		//return $data;
       // dd($data);
    	$create = User::create($data);

    	if ($create) {
    		return redirect()->back()->with(['success' => 'Data berhasil di tambahkan']);
    	} else {
    		return redirect()->back()->with(['failed'=> 'Data gagal di tambahkan, coba lagi beberapa saat']);
    	}
		
    }
	public function search(Request $request)
    {
        $keyword = $request->search;
        $users = User::where('username', 'like', "%" . $keyword . "%")->get();
        return view('admin.admin', compact('users'));
    }
    public function delete(Request $request)
    {
        if ($request->data) {
            
        	foreach ($request->data as $key => $v) {
        		$user = User::find($v);
        		if ($user) {
        			if (!$user->is_admin) {
                        // Delete file
                        File::delete('img/nasabah/'. $user->gambar);
        				$user->delete();
        			}
        		}
        	}
    	   return response()->json(['success' => 1], 200);
        }

        return response()->json(['success' => 0], 200);
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.nasabah-tambah', compact(['data']));
    }

    public function update($id, Request $request)
    {
        
        $data = $request->except('password_confirmation');
        $user = User::findOrFail($id);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->file) {

            // Delete file lama
          //  File::delete('img/nasabah/'. $user->gambar);

            // Upload file baru
            $file = $request->file('gambar');
            $namafile = uniqid().'.'.$file->extension();
            $file->move('img/nasabah', $namafile);
            $data['gambar'] = $namafile;

        } else {

            unset($data['gambar']);
        }

        $update = $user->update($data);

        if ($update) {
            return redirect()->route('admin.nasabah')->with(['success' => 'Berhasil mengupdate data']);
        } else {
            return redirect()->back()->with(['failed' => 'Gagal mengupdate data, coba beberapa saat lagi']);
        }
    }
}
