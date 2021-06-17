<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class TransferController extends Controller
{
    public function index(){
        return view ('nasabah.transfer');
    }

    public function send(Request $request)
    {
    	$user = User::where('no_rek', $request->no_rek);

    	if (!$user->count()) {
    		return "Nasabah tidak di temukan";
    	} else {

    		$userData = $user->first();
    		$saldoUser = Auth::user()->saldo;
    		$saldoAwal = $userData->saldo;
    		$jumlah = $request->jumlah;

    		$totalTransfer = $saldoAwal + $jumlah;
    		$user->update([
    			'saldo' => $totalTransfer
    		]);

    		User::find(Auth::user()->id)->update([
    			'saldo' => Auth::user()->saldo - $jumlah
    		]);

    		return redirect()->route('home');
    	}
    }
}
