<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Riwayat;
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

        $target = User::find(Auth::user()->id);
    	$saldoAwal = Auth::user()->saldo;
    	$topupSaldo = $request->saldo;
    	$total = $saldoAwal + $topupSaldo;

    	$topup = $target->update([
    		'saldo' => $total
    	]);

        Riwayat::create([
            'from_id' => null,
            'target_id' => $target->id,
            'jumlah_topUp'=> $topupSaldo,
            'is_topup' => 1
        ]);

    	if ($topup) {
    		return redirect()->route('home');
    	} else {
    		return redirect()->back();
    	}
    }

    public function history()
    {
        $riwayat = Riwayat::where('from_id', Auth::user()->id)->orWhere('target_id', Auth::user()->id)->get();

        $data = [];
        foreach ($riwayat as $r) {
            $from = User::where('id', $r->from_id)->first();
            $target = User::where('id', $r->target_id)->first();
            $r->target = $target;
            $r->from = $from;
            $data[] = $r;
           // dd($data);
        }

        return view('Nasabah.RiwayatSaldo', compact(['data']));
    }
}
