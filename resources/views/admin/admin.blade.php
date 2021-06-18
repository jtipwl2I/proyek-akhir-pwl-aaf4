@extends('layouts.app')
@section('section-header', 'Kelola Nasabah')
@section('content')<div class="card card-primary card-outline">
	<div class="card-header text-primary">Tabel Nasabah</div>
	<div class="card-body">
		<form class="form" method="get" action="{{ route('admin.nasabah.search') }}">
			<div class="form-group w-100 mb-3">
				<label for="search" class="d-block mr-2">Pencarian</label>
				<input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
				<button type="submit" class="btn btn-primary mb-1">Cari</button>
			</div>
		</form>
		<div style="overflow-x: auto;">
			<table class="table table-bordered" id="myTable">
				<thead>
					<tr>
						<th>
							<input type="checkbox" class="" id="checkall">
						</th>
						<th>Gambar</th>
						<th>Nama depan</th>
						<th>Nama belakang</th>
						<th>Nomor Rekening</th>
						<th>Email</th>
						<th>Provinsi</th>
						<th>Kota</th>
						<th>Postal code</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td><input type="checkbox" name="delete[]" value="{{ $user->id }}"></td>
						<td><img src="/img/nasabah/{{ $user->gambar }}" style="width: 100px;"></td>
						<td>{{ $user->first_name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->no_rek }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->province }}</td>
						<td>{{ $user->city }}</td>
						<td>{{ $user->postal_code }}</td>
						<td>
							<a href="/admin/nasabah/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>
							<a class="btn btn-info" onclick="showData({{ $user->id }})">Lihat</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer">
		<button id="delete" class="btn btn-danger">Hapus</button>
		
	</div>

</div>

<div class="card card-outline card-primary mt-3" id="userData" style="display: none;">
	<div class="card-header text-primary">Data Nasabah</div>
	<div class="card-body">
		<div class="row">			<div class="form-group col-6">
				<label for="first_name">First Name</label>
				<input readonly id="first_name" type="text" class="form-control" name="first_name" autofocus>
			</div>
			<div class="form-group col-6">
				<label for="last_name">Last Name</label>
				<input readonly id="last_name" type="text" class="form-control" name="last_name">
			</div>
		</div>
		<div class="form-group col-6">
			<label for="no_rek">No Rekening</label>
			<input readonly id="no_rek" type="text" class="form-control" name="no_rek" value="{{ Auth::user()->no_rek }}">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input readonly id="email" type="email" class="form-control" name="email">
			<div class="invalid-feedback">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<label>Country</label>
				<input readonly type="text" class="form-control" name="country">
			</div>
			<div class="form-group col-6">
				<label>Province</label>
				<input readonly type="text" class="form-control" name="province">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<label>City</label>
				<input readonly type="text" class="form-control" name="city">
			</div>
			<div class="form-group col-6">
				<label>Postal Code</label>
				<input readonly type="text" class="form-control" name="postal_code">
			</div>
		</div>
	</div>
	<div class="card-footer">
		<div class="text-right">
			<button class="btn btn-info" onclick="$('#userData').hide();">Tutup</button>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	const users = [
	@foreach($users as $user)
	{
		id: {{ $user->id }},
		first_name: '{{ $user->first_name }}',
		last_name: '{{ $user->last_name }}',
		email: '{{ $user->email }}',
		country: '{{ $user->country }}',
		province: '{{ $user->province }}',
		city: '{{ $user->city }}',
		postal_code: '{{ $user->postal_code }}',
	},
	@endforeach
	];

	function showData(id){
		let user;
		$.each(users, function(i, d){
			if (id == d.id) {
				user = d;
			}
		});

		$('#userData').show();
		$('#userData input[name=first_name]').val(user.first_name);
		$('#userData input[name=last_name]').val(user.last_name);
		$('#userData input[name=email]').val(user.email);
		$('#userData input[name=province]').val(user.province);
		$('#userData input[name=country]').val(user.country);
		$('#userData input[name=city]').val(user.city);
		$('#userData input[name=postal_code]').val(user.postal_code);
	}

	$(function(){

		$('#checkall').click(function(){

			if ($('#checkall:checked').length) {

				$('#myTable input[name="delete[]"]').attr('checked','checked');
			} else {

				$('#myTable input[name="delete[]"]').removeAttr('checked');
			}

		});

		$('#delete').click(function(){

			let data = [];
			let checkbox = $('#myTable input[name="delete[]"]:checked');
			checkbox.each(function(i, d){

				data.push(d.value);
			});

			$('#delete').attr('disabled','disabled');
			
			$.ajax({
				url:'{{ route("admin.nasabah.delete") }}',
				type: 'post',
				data: {
					_token: '{{ csrf_token() }}',
					data: data,
				},
				success: function(result){
					$('#delete').removeAttr('disabled');
					if (result.success) {
						window.location.href = '';
					}
				}
			})
		});

	});
</script>
@endsection