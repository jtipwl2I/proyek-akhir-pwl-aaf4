@extends('layouts.app')
@section('section-header', 'Identitas Nasabah')
@section('content')
<div class="card card-outline card-primary mt-3" id="userData">
	<div class="card-header text-primary">Data Nasabah</div>
	<div class="card-body">
		<label>Gambar</label><br>
		<img src="{{ asset('img/nasabah').'/'.Auth::user()->gambar }}" style="width: 200px;" class="mb-3">
		<div class="row">		
			<div class="form-group col-6">
			<label for="first_name">First Name</label>
			<input readonly id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
		</div>
		<div class="form-group col-6">
			<label for="last_name">Last Name</label>
			<input readonly id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
		</div>
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input readonly id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
		<div class="invalid-feedback">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-6">
			<label>Country</label>
			<input readonly type="text" class="form-control" name="country" value="{{ Auth::user()->country }}">
		</div>
		<div class="form-group col-6">
			<label>Province</label>
			<input readonly type="text" class="form-control" name="province" value="{{ Auth::user()->province }}">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-6">
			<label>City</label>
			<input readonly type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
		</div>
		<div class="form-group col-6">
			<label>Postal Code</label>
			<input readonly type="text" class="form-control" name="postal_code" value="{{ Auth::user()->postal_code }}">
		</div>
	</div>
</div>
<div class="card-footer">
	<div class="text-right">
		<button class="btn btn-secondary" onclick="$('#userData').hide(); $('#userForm').show()" id="btnEdit">Edit</button>
	</div>
</div>
</div>

<form class="card card-outline card-primary mt-3" id="userForm" enctype="multipart/form-data" method="post" style="display: none;"  action="{{route('setting.post')}}">
	@csrf
	<div class="card-header text-primary">Ubah Data Admin</div>
	<div class="card-body">
		<div class="row">			
			<div class="form-group col-6">
			<label for="first_name">First Name</label>
			<input id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
		</div>
		<div class="form-group col-6">
			<label for="last_name">Last Name</label>
			<input id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
		</div>
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
		<div class="invalid-feedback">
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label for="password">Password</label>
				<input id="password" type="password" class="form-control" name="password">
				<div class="invalid-feedback">
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label for="password">Password Confirmation</label>
				<input id="password" type="password" class="form-control" name="password_confirmation">
				<div class="invalid-feedback">
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="file">Gambar</label><br>
		<input id="file" type="file" name="gambar">
		<div class="invalid-feedback">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-6">
			<label>Country</label>
			<input type="text" class="form-control" name="country" value="{{ Auth::user()->country }}">
		</div>
		<div class="form-group col-6">
			<label>Province</label>
			<input type="text" class="form-control" name="province" value="{{ Auth::user()->province }}">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-6">
			<label>City</label>
			<input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
		</div>
		<div class="form-group col-6">
			<label>Postal Code</label>
			<input type="text" class="form-control" name="postal_code" value="{{ Auth::user()->postal_code }}">
		</div>
	</div>
</div>
<div class="card-footer">
	<div class="text-right">
		<button class="btn btn-secondary" type="button" onclick="$('#userForm').hide(); $('#userData').show()" id="btnEdit">Batal</button>
		<button class="btn btn-primary">Simpan</button>
	</div>
</div>
@csrf
</form>
@endsection
@section('js')
<script type="text/javascript">
	const btnEdit = document.querySelector('#btnEdit');
	// const input = document.querySelector('#userData input');

	function updateData() {

		$('#userData input').removeAttr('readonly');
		btnEdit.innerHTML = 'Batal';
		btnEdit.addEventListener('onclick', cancelUpdateData());
	}

	function cancelUpdateData() {

		$('#userData input').attr('readonly','readonly');
		btnEdit.innerHTML = 'Edit';
		btnEdit.addEventListener('onclick', updateData());
	}

	$(function(){


	});
</script>
@endsection