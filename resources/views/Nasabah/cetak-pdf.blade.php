<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		
	</style>
</head>
<body class="bg-light">
	<div class="container">
		<div class="card shadow border-0">
			<div class="text-center">STRUK </div>
			<div class="card-body">
				<div class="border rounded p-3">
					@if($data->is_topup)
					<span class="bg-light px-3 py-2 border rounded">TOP UP</span>
					@else
					<span class="bg-light px-3 py-2 border rounded">TRANSFER</span>
					@endif
					<div class="row">
						<div class="col-lg-8"></div>
						<div class="col-lg-4">
							<b>Data pengirim :</b> <br>
							@if($data->from)
							Nama : {{ $data->from->first_name }} {{ $data->from->last_name }} <br>
							Nomor Rekening : {{ $data->from->no_rek }} <br>
							Foto : <br> <img src="{{ asset('img/nasabah/' . $data->from->gambar) }}"style="width: 100px;"> <br>
							@else
							-
							@endif
							<br><br>
							<b>Data penerima :</b> <br>
							Nama : {{ $data->target->first_name }} {{ $data->target->last_name }} <br>
							Nomor Rekenin : {{ $data->target->no_rek }} <br>
							Foto : <br> <img src="{{ asset('img/nasabah/' . $data->target->gambar) }}" style="width: 100px;"> <br>
						</div>
					</div>
					<br><br>
					<b>Data Transaksi :</b>
					<table class="table table-bordered" id="myTable">
						<thead>
							<tr>
								<th>Dari</th>
								<th>Kepada</th>
								<th>Nominal</th>
								<th>Tanggal Transaksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									@if($data->from)
									Nama : {{ $data->from->username }}<br>
									No Rek : {{ $data->from->no_rek }}
									@else
									-
									@endif
								</td>
								<td>
									Nama : {{ $data->target->username }}<br>
									No Rek : {{ $data->target->no_rek }}
								</td>
								@if($data->is_topup)
								<td>Rp{{ $data->jumlah_topUp }} <span class="badge badge-success">Topup</span></td>
								@else
								<td>Rp{{ $data->jumlah_transfer }} <span class="badge badge-warning">Transfer</span></td>
								@endif
								<td>{{ $data->created_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>