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
}
