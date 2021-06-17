<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdentitasNasabahController extends Controller
{
    public function index(){
        return view ('nasabah.identitasNasabah');
    }
}
