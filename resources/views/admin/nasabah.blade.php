@extends('layouts.app')
@section('section-header', 'Kelola Nasabah')
@section('content')<div class="card card-primary card-outline">
	<div class="card-header text-primary">Tabel Nasabah</div>
	<div class="card-body">
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>
						<input type="checkbox" class="" id="checkall">
					</th>
					<form class="form" method="get" action="{{ route('admin.nasabah.search') }}">
						<div class="form-group w-100 mb-3">
							<label for="search" class="d-block mr-2">Pencarian</label>
							<input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
							<button type="submit" class="btn btn-primary mb-1">Cari</button>
						</div>
					</form>
					<th>Foto</th>
					<th>Nama depan</th>
					<th>Nama belakang</th>
					<th>Email</th>
					<th>Provinsi</th>
					<th>Kota</th>
					<th>Postal code</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td><input type="checkbox" name="delete[]" value="{{ $user->id }}"></td>
					<td><img src="/img/nasabah/{{ $user->gambar }}"
						style="width: 100px;"></td>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->province }}</td>
					<td>{{ $user->city }}</td>
					<td>{{ $user->postal_code }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<button id="edit" class="btn btn-warning">Edit</button>
		<button id="show" class="btn btn-info">Show</button>
		<button id="delete" class="btn btn-danger">Hapus</button>
		
	</div>

</div>
@endsection
@section('js')
<script type="text/javascript">
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
					
					if (result.success) {
						window.location.href = '';
					}
				}
			})
		});

	});
</script>
@endsection