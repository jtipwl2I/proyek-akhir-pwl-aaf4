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
		

		


		// ubah format gambar jadi base64
		$path = 'img/nasabah/' . $data->target->gambar;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$gambar = file_get_contents($path);
		$data->target->gambar = 'data:image/'.$type.';base64,'.base64_encode($gambar);

		if($data->from){
	$path = 'img/nasabah/' . $data->from->gambar;
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$gambar = file_get_contents($path);
			$data->from->gambar = 'data:image/'.$type.';base64,'.base64_encode($gambar);
		}

		
	
		
	
		// // return $data;

		// // return view('Nasabah.cetak-pdf', compact(['data']));
		// $pdf = PDF::loadview('Nasabah.cetak-pdf', compact(['data']));
		// return $pdf->download('struk-saldo.pdf');

		$options = new \Dompdf\Options();
		$options->setIsRemoteEnabled(true);


		$dompdf = new \Dompdf\Dompdf($options);



		$data['data'] = $data;
		$dompdf->loadHtml(view('Nasabah.cetak-pdf', $data));

		$dompdf->setPaper('a4', 'portrait');
		$dompdf->render();
		$dompdf->stream('tes' . ".pdf", array('Attachment' => TRUE));
	}
}
