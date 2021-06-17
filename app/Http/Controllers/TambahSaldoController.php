<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahSaldoController extends Controller
{
    public function index(){
        return view ('nasabah.tambahSaldo');
    }
}
