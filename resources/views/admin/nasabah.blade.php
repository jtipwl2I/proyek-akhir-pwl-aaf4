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
	<div class="card-footer"></div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$(function(){

		$('#checkall').click(function(){

			if ($('#checkall:checked').length) {

				$('#myTable input[type="checkbox"]').attr('checked','checked');
			} else {

				$('#myTable input[type="checkbox"]').removeAttr('checked');
			}

		});

	});
</script>
@endsection