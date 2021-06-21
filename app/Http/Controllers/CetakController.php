<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\User;
use PDF;

class CetakController extends Controller
{
	public function index(Request $request)
	{

		$data = Riwayat::findOrFail($request->id);
		$from = User::where('id', $data->from_id)->first();
		$target = User::where('id', $data->target_id)->first();
		$data->target = $target;
		$data->from = $from;
		//dd($data);
	
		// return $data;

		// return view('Nasabah.cetak-pdf', compact(['data']));
		$pdf = PDF::loadview('Nasabah.cetak-pdf', compact(['data']));
		return $pdf->download('struk-saldo.pdf');
	}
}
