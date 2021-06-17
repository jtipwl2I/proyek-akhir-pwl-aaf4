<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class TambahSaldoController extends Controller
{
    public function index(){
        return view ('nasabah.tambahSaldo');
    }

    public function store(Request $request)
    {
    	if (!$request->saldo) {
    		$request->saldo = 0;
    	}

    	$saldoAwal = Auth::user()->saldo;
    	$topupSaldo = $request->saldo;
    	$total = $saldoAwal + $topupSaldo;

    	$topup = User::find(Auth::user()->id)->update([
    		'saldo' => $total
    	]);

    	if ($topup) {
    		return redirect()->route('home');
    	} else {
    		return redirect()->back();
    	}
    }
}
