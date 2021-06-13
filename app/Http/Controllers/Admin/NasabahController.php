<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class NasabahController extends Controller
{
    public function index()
    {
    	$users = User::all();
        return view('admin.nasabah', compact(['users']));
    }

    public function create()
    {
    	return view('admin.nasabah-tambah');
    }

    public function store(Request $request)
    {
    	// $request->validate([
    	// 	'first_name' => 'required|max:191',
    	// 	'last_name' => 'required|max:191',
    	// 	'email' => 'email|required|max:191',
    	// 	'password' => 'required|confirmed',
    	// 	'country' => 'required|max:191',
    	// 	'province' => 'required|max:191',
    	// 	'city' => 'required|max:191',
    	// 	'postal_code' => 'required'
    	// ]);

    	$data = $request->all();
    	$data['city'] = $request->city;
    	$data['password'] = bcrypt($data['password']);
    	$data['username'] = $request->first_name.' '.$request->last_name;

    	$create = User::create($data);

    	if ($create) {
    		return redirect()->back()->with(['success' => 'Data berhasil di tambahkan']);
    	} else {
    		return redirect()->back()->with(['failed'=> 'Data gagal di tambahkan, coba lagi beberapa saat']);
    	}
    }

    public function delete(Request $request)
    {
    	foreach ($request->data as $key => $v) {
    		$user = User::find($v);
    		if ($user) {
    			if (!$user->is_admin) {

    				$user->delete();
    			}
    		}
    	}

    	return response()->json(['success' => 1], 200);
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.nasabah-tambah', compact(['data']));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $update = User::findOrFail($id)->update($data);

        if ($update) {
            return redirect()->back()->with(['success' => 'Berhasil mengupdate data']);
        } else {
            return redirect()->back()->with(['failed' => 'Gagal mengupdate data, coba beberapa saat lagi']);
        }
    }
}
